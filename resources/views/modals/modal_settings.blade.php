<div id="modal_add_site" class="modal_md modal">
    <div class="modal-content">
        <h4 class="center-align">Добавление нового сайта</h4>
        <div class="row">
            <div class="col m12 input-field"><input type="text" id="name_site" name="site_name"><label for="name_site">Название сайта:</label></div>
        </div>
        <div class="row">
            <div class="col m12 input-field"><input type="text" id="link_site" name="site_link"><label for="link_site">Домен сайта:</label></div>
        </div>
        <div class="row">
            <div class="col m12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Выбирите файл:</span>
                        <input type="file"  name="site_file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="site_file_name">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat left red lighten-1">Закрыть</a>
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat green" id="button_add_modal_add_site" data-url="#">Добавить</a>
    </div>
</div>

