
!function ($) {
    "use strict";
    $(function () {


        $('#jstree_demo_div').jstree();

        $("#tree_2").jstree({
            plugins: ["wholerow", "checkbox", "types"], core: {
                themes: {
                    responsive: !1
                }
                , data: [{
                        text: "Same but with checkboxes", children: [{
                                text: "initially selected", state: {
                                    selected: !0
                                }
                            }
                            , {
                                text: "custom icon", icon: "fa fa-warning icon-state-danger"
                            }
                            , {
                                text: "initially open", icon: "fa fa-folder icon-state-default", state: {
                                    opened: !0
                                }
                                , children: ["Another node"]
                            }
                            , {
                                text: "custom icon", icon: "fa fa-warning icon-state-warning"
                            }
                            , {
                                text: "disabled node", icon: "fa fa-check icon-state-success", state: {
                                    disabled: !0
                                }
                            }
                        ]
                    }
                    , "And wholerow selection", "And wholerow selection", "And wholerow selection", "And wholerow selection", "And wholerow selection", "And wholerow selection", "And wholerow selection"]
            }
            , types: {
                "default": {
                    icon: "fa fa-folder icon-state-warning icon-lg"
                }
                , file: {
                    icon: "fa fa-file icon-state-warning icon-lg"
                }
            }
        }
        );

        $("#tree_3").jstree({
            core: {
                themes: {
                    responsive: !1
                }
                , check_callback: !0, data: [{
                        text: "Parent Node", children: [{
                                text: "Initially selected", state: {
                                    selected: !0
                                }
                            }
                            , {
                                text: "Custom Icon", icon: "fa fa-warning icon-state-danger"
                            }
                            , {
                                text: "Initially open", icon: "fa fa-folder icon-state-success", state: {
                                    opened: !0
                                }
                                , children: [{
                                        text: "Another node", icon: "fa fa-file icon-state-warning"
                                    }
                                ]
                            }
                            , {
                                text: "Another Custom Icon", icon: "fa fa-warning icon-state-warning"
                            }
                            , {
                                text: "Disabled Node", icon: "fa fa-check icon-state-success", state: {
                                    disabled: !0
                                }
                            }
                            , {
                                text: "Sub Nodes", icon: "fa fa-folder icon-state-danger", children: [{
                                        text: "Item 1", icon: "fa fa-file icon-state-warning"
                                    }
                                    , {
                                        text: "Item 2", icon: "fa fa-file icon-state-success"
                                    }
                                    , {
                                        text: "Item 3", icon: "fa fa-file icon-state-default"
                                    }
                                    , {
                                        text: "Item 4", icon: "fa fa-file icon-state-danger"
                                    }
                                    , {
                                        text: "Item 5", icon: "fa fa-file icon-state-info"
                                    }
                                ]
                            }
                        ]
                    }
                    , "Another Node"]
            }
            , types: {
                "default": {
                    icon: "fa fa-folder icon-state-warning icon-lg"
                }
                , file: {
                    icon: "fa fa-file icon-state-warning icon-lg"
                }
            }
            , state: {
                key: "demo2"
            }
            , plugins: ["contextmenu", "dnd", "state", "types"]
        }
        );
    });


}(window.jQuery);