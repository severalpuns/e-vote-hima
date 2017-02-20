<!doctype html>
<html lang="en">
<head>

<!-- CSS Start Here -->
    <?php
    $this->load->view("admin/mustincluded/css");
    ?>
<!-- CSS Stop Here -->
        <script src="<?php echo base_url('assets/chart/canvas.js');?>"></script>
        <script src="<?php echo base_url('assets/chart/chart.js');?>"></script>

        <?php
            if ($sudah == 0) {
            } else {
            $p_MMB01 = $MMB01 / $sudah * 100;
            $p_MMB02 = $MMB02 / $sudah * 100;
            $p_MMB03 = $MMB03 / $sudah * 100;

            $dataPoints = array(
                array("y" => $p_MMB01, "name" => "Budi Sudarsono", "exploded" => true),
                array("y" => $p_MMB02, "name" => "Aceng Penjual Bakso Borak"),
                array("y" => $p_MMB03, "name" => "Ali Markhus"),
            );
            }
        ?> 

</head>
<body>


<div class="wrapper">

<!-- Slide Bar Start Here -->
    <?php
    $this->load->view("admin/mustIncluded/slidebar");
    ?>
<!-- Slide Bar Stop Here -->

    <div class="main-panel">

<!-- Header Start Here-->
    <?php
    $this->load->view('admin/mustIncluded/header');
    ?>
<!-- Header Stop Here-->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Quick Count 
                                <?php 
                                    echo date('l');
                                    echo (' ');
                                    echo date('d-m-Y')
                                ?>
                                    
                                </h4>
                                <h6 class="title"><?php echo $sudah; ?> Suara dari <?php echo $belum; ?> Total Suara</h6>
                            </div>
                            <div id="chartContainer"></div>
                            <script type="text/javascript">
                                $(function () {
                                    var chart = new CanvasJS.Chart("chartContainer",
                                    {
                                        theme: "theme2",
                                        title:{
                                            text: "Hasil Qucik Count"
                                        },
                                        exportFileName: "Hasil Quick Count",
                                        exportEnabled: true,
                                        animationEnabled: true,     
                                        data: [
                                        {       
                                            type: "pie",
                                            showInLegend: true,
                                            toolTipContent: "{name}: <strong>{y}%</strong>",
                                            indexLabel: "{name} {y}%",
                                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                        }]
                                    });
                                    chart.render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Footer Start Here-->
    <?php
    $this->load->view("admin/mustIncluded/footer");
    ?>
<!-- Footer Stop Here-->


    </div>
</div>

<!-- Javascript Start Here-->
    <?php
    $this->load->view("admin/mustIncluded/javascript");
    ?>
<!-- Javascript Stop Here-->

</body>



</html>
