<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shamcey - Metro Style Admin Template</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <link rel="stylesheet" href="css/responsive-tables.css">

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/tab.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            // dynamic table
            jQuery('#dyntable').dataTable({
                "sPaginationType": "full_numbers",
                "aaSortingFixed": [[0,'asc']],
                "fnDrawCallback": function(oSettings) {
                    jQuery.uniform.update();
                }
            });

            jQuery('#dyntable2').dataTable( {
                "bScrollInfinite": true,
                "bScrollCollapse": true,
                "sScrollY": "300px"
            });

        });
    </script>
</head>

<body>

<div class="mainwrapper">
    <div class="maincontent">
        <div class="maincontentinner">

            <table id="dyntable" class="table table-bordered responsive">
                <colgroup>
                    <col class="con0" style="align: center; width: 4%" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                </colgroup>
                <thead>
                <tr>
                    <th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                    <th class="head0">Rendering engine</th>
                    <th class="head1">Browser</th>
                    <th class="head0">Platform(s)</th>
                    <th class="head1">Engine version</th>
                    <th class="head0">CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr class="gradeX">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Trident</td>
                    <td>Internet Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td class="center">4</td>
                    <td class="center">X</td>
                </tr>
                <tr class="gradeC">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Trident</td>
                    <td>Internet Explorer 5.0</td>
                    <td>Win 95+</td>
                    <td class="center">5</td>
                    <td class="center">C</td>
                </tr>
                <tr class="gradeA">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Trident</td>
                    <td>Internet Explorer 5.5</td>
                    <td>Win 95+</td>
                    <td class="center">5.5</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Trident</td>
                    <td>Internet Explorer 6</td>
                    <td>Win 98+</td>
                    <td class="center">6</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Trident</td>
                    <td>Internet Explorer 7</td>
                    <td>Win XP SP2+</td>
                    <td class="center">7</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Trident</td>
                    <td>AOL browser (AOL desktop)</td>
                    <td>Win XP</td>
                    <td class="center">6</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Gecko</td>
                    <td>Firefox 1.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td class="center">1.7</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Gecko</td>
                    <td>Firefox 1.5</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td class="center">1.8</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Gecko</td>
                    <td>Firefox 2.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td class="center">1.8</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Gecko</td>
                    <td>Firefox 3.0</td>
                    <td>Win 2k+ / OSX.3+</td>
                    <td class="center">1.9</td>
                    <td class="center">A</td>
                </tr>
                <tr class="gradeA">
                    <td><span class="center">
                            <input type="checkbox" />
                          </span></td>
                    <td>Gecko</td>
                    <td>Camino 1.0</td>
                    <td>OSX.2+</td>
                    <td class="center">1.8</td>
                    <td class="center">A</td>
                </tr>
                </tbody>
            </table>

            <br /><br />


        </div><!--maincontentinner-->
    </div><!--maincontent-->

</div><!--rightpanel-->

</div><!--mainwrapper-->
</body>
</html>
