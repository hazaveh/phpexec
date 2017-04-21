<div class="modal fade" tabindex="-1" role="dialog" id="hints">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">You may want to know!</h4>
            </div>
            <div class="modal-body" style="text-align: justify">
                <h4>Symfony Var Dumper</h4>
                <p>Installation of this package will include symfony var_dumper component. You can use <code>dump</code> functions anywhere within your code as you wish.</p><br>
                <h4>Custom php.ini variables</h4>
                <p>There is a php.ini file within the root of this project. you can simply edit this file and override the variables of php interpreter. remember this feature only works with command <code>php phpexec serve</code></p><br />
                <h4>Composer Friendly</h4>
                <p>Feel free to pull in any composer package doing <code>composer install package_name</code>. phpexec will automatically load the package in the editor and you can start creating instances of the package and use the methods.</p><br />
                <h4>Safety</h4>
                <p>Do not host this package on any public provider. This script allows the user to execute any php command on the server.</p><br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="save-snippet">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Save Your Work!</h4>
            </div>
            <div class="modal-body" style="text-align: justify">
                <p>You can save your current code as a snippet and access it next time you open phpexec. just give it a name and click on save.</p>
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" placeholder="Enter a name" v-model="newSnippet" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-success" v-on:click="saveSnippet" >Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="manage-snippet">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Manage Snippets!</h4>
            </div>
            <div class="modal-body" style="text-align: justify">
                <table class="table table-striped">
                    <tr v-for="(v, k) in snippets">
                    <td width="70%">{{v.name}}</td>
                    <td><a href="#" v-on:click="loadSnippet(k)" data-dismiss="modal" >Load</a></td>
                    <td><a href="#" v-on:click="removeSnippet(v.file, k)">Remove</a></td>
                    </tr>
                </table>
                <div class="alert alert-danger" v-if="snippets.length < 1" >There is no snippet saved in the system.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->