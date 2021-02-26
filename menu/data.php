<?php
include 'bootstrap\template.php';
include 'link_descriptions\link_descriptions.php';

?>

<!--Скрипт вывода подсказки-->
<script src = "http://code.jquery.com/jquery-latest.js"></script>



<div id="tooltip"></div>
<div class="container">
    <div class="row">


        <div class="col-3 col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <!--Карточка 1-->
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Образование</h5>
                    <p class="card-text">
                        <?php
                        echo $educ
                        ?>
                    <ul class="list-group list-group-flush">

                    </ul>
                    </p>


                </div>
            </div>
        </div>


        <div class="col-3 col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <!--Карточка 2-->
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Культура</h5>
                    <p class="card-text"></p>
                    <?php
                    echo $cult;
                    ?>

                </div>
            </div>
        </div>


        <div class="col-3 col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <!--Карточка 3-->
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Молодёжная политика</h5>
                    <p class="card-text"></p>
                    <?php
                    echo $young;
                    ?>

                </div>
            </div>
        </div>


        <div class="col-3 col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <!--Карточка 4-->
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Экономическая политика</h5>
                    <p class="card-text"></p>
                    <?php
                    echo $ec;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #tooltip {
        z-index: 9999;
        position: absolute;
        display: none;
        top:0px;
        left:0px;
        background-color: #000;
        padding: 5px 10px 5px 10px;
        color: white;
        opacity: 1.0;
        border-radius: 5px;
    }
</style>
<script>
    $("[data-tooltip]").mousemove(function (eventObject) {

        $data_tooltip = $(this).attr("data-tooltip");

        $("#tooltip").text($data_tooltip)
            .css({
                "top" : eventObject.pageY + 5,
                "left" : eventObject.pageX + 5
            })
            .show();

    }).mouseout(function () {

        $("#tooltip").hide()
            .text("")
            .css({
                "top" : 0,
                "left" : 0
            });
    });
</script>