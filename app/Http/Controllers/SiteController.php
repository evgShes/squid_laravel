<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\SiteRequest;
use Illuminate\Support\Facades\File as FileFacade;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tags\SinceTest;

class SiteController extends Controller
{
    use FunctionTrait;

    public function view(Request $request)
    {
        $sites = Site::all()->load('relFiles');
//        dd(Storage::disk('local'));
        return view('control_panel.settings', ['sites' => $sites]);
    }


    public function create(SiteRequest $request)
    {
        $resp = false;
        $input = $request->except('file');
        $input = array_merge($input, parse_url($request->domain));
        if (!array_key_exists('host', $input)) return response()->json(['noty' => 'Проверте правильность ввода доменного имени.'], 422);
        $save_site = Site::trtCreateOrEdit($input);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $saveFile = File::saveFile($file, [
                'rel_type' => Site::class,
                'rel_id' => $save_site->id,
            ]);
        }
        if ($saveFile) $resp = true;
        return response()->json($resp);
    }

    public function block(Request $request)
    {
//        dd($request->all());
        $response = false;
        $path_to_file_dom = $this->path_domains_rules;
        $sqCont = new SquidController();
        if ($request->has('blocked_sites')) {
            $ids = $request->blocked_sites;
            $sites_blocked = Site::whereIn('id', $ids);
            $site_unblocked = Site::whereNotIn('id', $ids)->where('status', true);
            $clone_site_model = clone $sites_blocked;
            if (!$clone_site_model->get()->isEmpty()) {
                $sites_domain = $clone_site_model->pluck('host')->toArray();
                $string_sites = implode($this->end, $sites_domain);
                $save_in_dom_deny = FileFacade::put($path_to_file_dom, $string_sites);
                if ($save_in_dom_deny) {
                    $update_status_site = $clone_site_model->update(['status' => true]);
                    if ($site_unblocked) $update_unlocked_site = $site_unblocked->update(['status' => false]);
                    if ($update_status_site) {
                        $response = true;
                    }
                }
            }
        } else {
            if (filesize($path_to_file_dom)) {
                $save_in_dom_deny = FileFacade::put($path_to_file_dom, '');
            }
            $update_status_site = Site::blocked()->update(['status' => false]);
            $response = true;
        }
        return response()->json($response);
    }
//    public function journal()
//    {
//        $journal = UsersList::all();
//        return view('systems.journal', ['journal'=>$journal]);
//    }
}
