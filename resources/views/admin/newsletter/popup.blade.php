<div class="modal fade" id="subs_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2cabe3;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Send Message To Subscriber </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form"  enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    {{ Form::hidden('newsletter_send_date',  ['class' => 'form-control']) }}
                    <div class="form-body">
                        <div class="form-body">
                            <input type="hidden" name="ID" value="">
                            <table class="table" id="sample">
                                <thead>
                                <tr>
                                    <th>
                                        Newsletter Title
                                    </th>
                                    <th>
                                        Total Subscriber
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="">
                                    <td>
                                        <strong></strong>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info" id="btnsubmit">Send message</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>