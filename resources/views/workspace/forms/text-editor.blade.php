<div class="text-editor">
    <div class="toolbar" style="display: none;">
        <a class='btn' data-wysihtml5-command="bold" title="CTRL+B"><i class="fa fa-bold"></i></a>
        <a class='btn' data-wysihtml5-command="italic" title="CTRL+I"><i class="fa fa-italic"></i></a>
        <a class='btn' data-wysihtml5-command="justifyLeft">align left</a>
        <a class='btn' data-wysihtml5-command="justifyCenter">align center</a>
        <a class='btn' data-wysihtml5-command="justifyRight">align right</a>
        <a class='btn' data-wysihtml5-command="createLink"><i class='fa fa-link'></i></a>
        <a class='btn' data-wysihtml5-command="insertImage"><i class='fa fa-image'></i></a>
        <a class='btn' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">h1</a>
        <a class='btn' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">h2</a>
        <a class='btn' data-wysihtml5-command="insertUnorderedList"><i class='fa fa-list-ul'></i></a>
        <a class='btn' data-wysihtml5-command="insertOrderedList"><i class='fa fa-list-ol'></i></a>
        <a class='btn btn-danger' data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">red</a>
        <a class='btn btn-success' data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">green</a>
        <a class='btn btn-primary' data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">blue</a>
        <a class='btn' data-wysihtml5-command="undo" title="undo"><i class="fa fa-chevron-left"></i></a>
        <a class='btn' data-wysihtml5-command="redo"title="redo"><i class="fa fa-chevron-right"></i></a>
        <a class='btn' data-wysihtml5-command="insertSpeech">speech</a>
        <a class='btn' data-wysihtml5-action="change_view">switch to html view</a>

        <div data-wysihtml5-dialog="createLink" style="display: none;">
            <label>
                Link:
                <input data-wysihtml5-dialog-field="href" value="http://">
            </label>
            <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
        </div>

        <div data-wysihtml5-dialog="insertImage" style="display: none;">
            <label>
                Image:
                <input data-wysihtml5-dialog-field="src" value="http://">
            </label>
            <label>
                Align:
                <select data-wysihtml5-dialog-field="className">
                    <option value="">default</option>
                    <option value="wysiwyg-float-left">left</option>
                    <option value="wysiwyg-float-right">right</option>
                </select>
            </label>
            <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
        </div>

    </div>
    <textarea name="about" class="form-control" placeholder="Enter text ..."></textarea>
    <br><input type="reset" value="Reset form!">
</div>