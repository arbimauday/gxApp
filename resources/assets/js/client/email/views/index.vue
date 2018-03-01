<template>
    <div>
        <!-- Start Second Nav -->
        <nav class="secondary-sidebar">
            <div class=" m-b-30 m-l-30 m-r-30 hidden-sm-down">
                <a href="email_compose.html" class="btn btn-complete btn-block btn-compose">Compose</a>
            </div>
            <p class="menu-title">BROWSE</p>
            <ul class="main-menu">
                <li class="active">
                    <a href="#">
                        <span class="title"><i class="pg-inbox"></i> Inbox</span>
                        <span class="badge pull-right">5</span>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <span class="title"><i class="pg-folder"></i> All mail</span>
                    </a>
                    <ul class="sub-menu no-padding">
                        <li>
                            <a href="#">
                                <span class="title">Important</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="title">Labeled</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="title"><i class="pg-sent"></i> Sent</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"><i class="pg-spam"></i> Spam</span>
                        <span class="badge pull-right">10</span>
                    </a>
                </li>
            </ul>
            <p class="menu-title m-t-20 all-caps">Quick view</p>
            <ul class="sub-menu no-padding">
                <li>
                    <a href="#">
                        <span class="title">Documents</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title">Flagged</span>
                        <span class="badge pull-right">5</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title">Images</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Second Nav -->

        <!-- Start Box Message -->
        <div class="inner-content full-height">
            <div class="split-view">
                <!-- START SPLIT LIST VIEW -->
                <div class="split-list">
                    <a class="list-refresh" href="#"><i class="fa fa-refresh"></i></a>
                    <div data-email="list" class="boreded no-top-border list-view" style="min-height:1300px;height:100%;">
                        <!-- START EMAIL LIST SORTED BY DATE -->
                        <h2 class="list-view-fake-header">Today April 23</h2>
                        <div class="list-view-wrapper" data-ios="false">
                            <div class="list-view-group-container">
                                <div class="list-view-group-header">
                                    <span>Today April 23</span>
                                </div>
                                <ul class="no-padding">
                                    <li class="item padding-15" data-email-id="1">
                                        <div class="thumbnail-wrapper d32 circular">
                                            <img width="40" height="40" alt="" src="temp/assets/img/profiles/avatar2x.jpg"/>
                                        </div>
                                        <div class="checkbox  no-margin p-l-10">
                                            <input type="checkbox" value="1" id="emailcheckbox-0-0">
                                            <label for="emailcheckbox-0-0"></label>
                                        </div>
                                        <div class="inline m-l-15">
                                            <p class="recipients no-margin hint-text small">David Nester,Jane Smith</p>
                                            <p class="subject no-margin">Pages - Multi-Purpose Admin Template Revolution Begins here!</p>
                                            <p class="body no-margin">
                                                Than you for taking the time to read this letter.
                                                I have been a satisfied customer of your company for many years and this is
                                                the first time I have encountered a problem.
                                                If you need to contact me, you can reach me at (555) 555-5555.Sincerely,Signature
                                            </p>
                                        </div>
                                        <div class="datetime">5 Mins ago</div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END EMAIL LIST SORTED BY DATE -->
                    </div>
                </div>
                <!-- END SPLIT LIST VIEW -->
                <!-- START SPLIT DETAILS -->
                <div data-email="opened" class="split-details">
                    <div class="no-result" style="display: none;">
                        <h1>No email has been selected</h1>
                    </div>
                    <div class="email-content-wrapper" style="">
                        <div class="actions-wrapper menuclipper bg-master-lightest">
                            <ul class="actions menuclipper-menu no-margin p-l-20 ">
                                <li class="hidden-lg-up">
                                    <a href="#" class="split-list-toggle"><i class="fa fa-angle-left"></i> All Inboxes</a>
                                </li>
                                <li class="no-padding"><a href="#" class="text-info">Reply</a>
                                </li>
                                <li class="no-padding"><a href="#">Reply all</a>
                                </li>
                                <li class="no-padding"><a href="#">Forward</a>
                                </li>
                                <li class="no-padding"><a href="#">Mark as read</a>
                                </li><div class="dropdown menuclipper-dropdown" style="display: block;"><button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button><ul class="dropdown-menu menuclipper-dropdown-menu pull-right" role="menu"><li role="presentation"><a href="#" class="text-danger">Delete</a>
                            </li></ul></div>
                                <li class="no-padding  hidden"><a href="#" class="text-danger">Delete</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="email-content">
                            <div class="email-content-header">
                                <div class="thumbnail-wrapper d48 circular">                                     <img width="40" height="40" alt="" data-src-retina="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar2x.jpg">                                 </div>
                                <div class="sender inline m-l-10">
                                    <p class="name no-margin bold">David Nester</p>
                                    <p class="datetime no-margin">Today at 1:33pm</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="subject m-t-20 m-b-20 semi-bold">Pages - Multi-Purpose Admin Template Revolution Begins here!</div>
                                <div class="fromto">
                                    <div class="pull-left">
                                        <div class="btn-group dropdown-default">
                                            <a class="btn dropdown-toggle btn-small btn-rounded" data-toggle="dropdown" href="#">
                                                David Nester
                                                </a>
                                            <div class="dropdown-menu" style="width: 151px;">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Friend</a>
                                                <a class="dropdown-item" href="#">Report</a>
                                            </div>
                                        </div>
                                        <label class="inline">
                                            <span class="muted">&nbsp;&nbsp;to</span>
                                            <span class=" small-text">johnsmith@skyace.com</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="email-content-body m-t-20"><p>Dear Sir or Madam:<br></p><p><br>I have recently ordered a new pair of soccer cleats (item #6542951) from your website on June 21. I received the order on June 26. Unfortunately, when I opened it, I saw that the cleats were used. The cleats had dirt all over it and there was a small tear in front of the part where the left toe would go.  My order number is AF26168156.<br></p><p><br>To resolve the problem, I would like you to credit my account for the amount charged for my cleats; I have already went out and bought a new pair of cleats at my local sporting goods store so sending another would result in me having two pairs of the same cleats.<br></p><p><br>Than you for taking the time to read this letter.  I have been a satisfied customer of your company for many years and this is the first time I have encountered a problem.  If you need to contact me, you can reach me at (555) 555-5555.<br><br><br><br>Sincerely,<br></p><p><br><i>Signature</i></p> </div>
                            <div class="wysiwyg5-wrapper b-a b-grey m-t-30">
                                <ul class="wysihtml5-toolbar" style=""><li class="dropdown dropup"><a data-toggle="dropdown" class="btn btn-default dropdown-toggle ">    <span class="glyphicon glyphicon-font"></span>    <span class="current-font">Normal text</span>    <b class="caret"></b>  </a><ul class="dropdown-menu">    <li><a tabindex="-1" data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal text</a></li>     <li><a tabindex="-1" data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 1</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 2</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h3" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 3</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h4" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 4</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h5" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 5</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h6" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 6</a></li>  </ul></li><li><div class="btn-group"><a tabindex="-1" title="CTRL+B" data-wysihtml5-command="bold" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-bold"></i></a><a tabindex="-1" title="CTRL+I" data-wysihtml5-command="italic" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-italic"></i></a><a tabindex="-1" title="CTRL+U" data-wysihtml5-command="underline" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-underline"></i></a></div></li><li><a tabindex="-1" data-wysihtml5-display-format-name="false" data-wysihtml5-command-value="blockquote" data-wysihtml5-command="formatBlock" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-quote"></i></a></li><li><div class="bootstrap-wysihtml5-insert-link-modal modal fade"><div class="modal-dialog "><div class="modal-content"><div class="modal-header"><a data-dismiss="modal" class="close">×</a><h3>Insert link</h3></div><div class="modal-body"><input class="bootstrap-wysihtml5-insert-link-url form-control" value="http://"><div class="checkbox check-success"> <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="checked" value="1" id="link-checkbox"> <label for="link-checkbox">Open link in new window</label></div></div><div class="modal-footer"><a data-dismiss="modal" class="btn btn-default">Cancel</a><a data-dismiss="modal" class="btn btn-primary" href="#">Insert link</a></div></div></div></div><a tabindex="-1" title="Insert link" data-wysihtml5-command="createLink" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-link"></i></a></li><li><div class="bootstrap-wysihtml5-insert-image-modal modal fade"><div class="modal-dialog "><div class="modal-content"><div class="modal-header"><a data-dismiss="modal" class="close">×</a><h3>Insert image</h3></div><div class="modal-body"><input class="bootstrap-wysihtml5-insert-image-url form-control" value="http://"></div><div class="modal-footer"><a data-dismiss="modal" class="btn btn-default">Cancel</a><a data-dismiss="modal" class="btn btn-primary">Insert image</a></div></div></div></div><a tabindex="-1" title="Insert image" data-wysihtml5-command="insertImage" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-image"></i></a></li></ul><textarea class="email-reply" placeholder="Reply" style="display: none;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(169, 169, 169); border-style: solid; border-width: 1px; clear: none; display: inline-block; float: none; margin: 0px; outline: rgb(0, 0, 0) none 0px; outline-offset: 0px; padding: 2px; position: static; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 163px; height: 200px; top: auto; left: auto; right: auto; bottom: auto;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SPLIT DETAILS -->
                <!-- START COMPOSE BUTTON FOR TABS -->
                <div class="compose-wrapper hidden-md-up">
                    <a class="compose-email text-info pull-right m-r-10 m-t-10" href="email_compose.html"><i class="fa fa-pencil-square-o"></i></a>
                </div>
                <!-- END COMPOSE BUTTON -->
            </div>
        </div>
        <!-- Start Box Message -->
    </div>
</template>