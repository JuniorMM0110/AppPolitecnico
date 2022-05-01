<?php


        function Buscador($tipoBuscar,$buscar){
            //conexion
            $conex = new Conexion();
            $cn = $conex-> conexion();
            //condicional para comprobar que vamos a buscar 
            $cadena="";
            if($tipoBuscar == "empleado"){
                $cadena = "empleado.Nombre";
            }else if($tipoBuscar == "usuario"){
                $cadena = "usuario.nombreUsuario";
            }else{
                $cadena = "correo.correo";
            }
            //consulta para ver los empleados
            $sql = "SELECT empleado.ID,empleado.salario,empleado.Nombre,empleado.Apellido,empleado.cedula,
            empleado.HoraEntrada,correo.correo,usuario.nombreUsuario,usuario.Nivel,empleado.fkUsuario,empleado.fkCorreo
            FROM empleado 
            INNER JOIN correo on correo.ID = empleado.fkCorreo
            INNER JOIN usuario on usuario.ID = empleado.fkUsuario WHERE $cadena LIKE '%$buscar%'";
            //preparar
            $consulta = $cn->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetch(PDO::FETCH_ASSOC);
            //return $registros;
            ?>
        
        </a>
        <table>
            <tr>
                <td>Nombre completo:</td>
                <td>Cedula</td>
                <td>Hora de entrada:</td>
                <td>Correo:</td>
                <td>Nombre de usuario:</td>
                <td>Salario del emepleado:</td>
                <td colspan="2">Opciones:</td>
                </tr>
                <?php
                //
                $consulta = $cn -> prepare($sql);
                try{
                    $consulta->execute();
                }catch(PDOException $e){
                    $e->getMessage();
                }
                while($resultado = $consulta->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                         <td><?php echo $registros['Nombre'];?></td>
                         <td><?php echo $registros['cedula'];?></td>
                         <td><?php echo $registros['HoraEntrada'];?></td>
                         <td><?php echo $registros['correo'];?></td>
                         <td><?php echo $registros['nombreUsuario'];?></td>
                         <td><?php echo $registros['salario'];?></td>
                         <?php echo $resultado['fkCorreo'];?>
                         <td><a href="../FormAjustes/formAjustes.php?id=<?php echo$resultado['ID']?>">Ajustes</a></td>
                        <td><a href="../modEmpleados.php?id=<?php echo$resultado['ID']?>&idUs=<?php echo$resultado['fkUsuario']?>&idCor=<?php echo$resultado['fkCorreo']?>">Eliminar</a></td>
                    </tr>
                
                <?php 
                }
        
                ?>
        </table>
      <?php  }
      ?>
