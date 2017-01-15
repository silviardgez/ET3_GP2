<?php

class MATERIA_Show_Profesores{
//VISTA PARA MOSTAR PÁGINAS QUE TIENEN ASOCIADAS LAS FUNCIONALIDADES
    private $datos;
    private $volver;

    function __construct($array, $volver){
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render(){
        ?>

        <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all"></head>
            <p>
                <h2>
                    <?php


                    include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';


                    ?>
                    <div>


                        <table  id="btable" border = 1>
                            <tr>
                                <?php



                                    echo "<th>";

                                    ?>


                                <?php
                                    echo $strings['Profes'];
                                    ?>
                                    </th>
                                    <?php

                                ?>
                            </tr>
                            <?php


                            for ($j=0;$j<count($this->datos);$j++){



                                echo "<tr>";

                                            ?>

                                            <?php

                                            echo "<td>";


                                            echo $this->datos[$j];

                                            echo "</td>";

                                ?>

                                <?php


                                ?>


                                <?php

                                echo "<tr>";

                            }
                            ?>

                        </table>

                    </div>
                    <h3>
            <p>
                <?php
                echo '<a class="form-link" href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
                ?>
                </h3>
            </p>

        </div>

        <?php
    } //fin metodo render

}
