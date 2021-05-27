<div class="box-body">
            <div class="form-group">
            <label for="nombre_usuario">Nombre usuario:</label>
            <input name="nombre_usuario" type="text" class="form-control" 
            id="nombre_usuario" value="<?php echo !isset($usuario['NOMBRE']) ?  "" :  $usuario['NOMBRE'];?>">
            </div>
            <div class="form-group">
            <label for="edad_usuario">Edad usuario:</label>
            <input name="edad_usuario" type="number" class="form-control" id="edad_usuario" value="<?php echo !isset($usuario['EDAD']) ?  "" :  $usuario['EDAD'];?>" >
            </div>
            <div class="form-group">
                <label for="sexo_usuario">Sexo:</label>
                <select name="sexo_usuario" class="form-control seleccionar">
                <option value="0" disabled selected>- Seleccione -</option>
                
                <option value="M" <?php echo isset($usuario["SEXO"]) && $usuario["SEXO"] == "M" ?  "selected" :  "";?>>Mujer</option>
                <option value="H" <?php echo isset($usuario["SEXO"]) && $usuario["SEXO"] == "H" ?  "selected" :  "";?>>Hombre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rol_usuario">Categoria:</label>
                <select name="rol_usuario" class="form-control seleccionar">
                <option value="0" disabled selected>- Seleccione -</option>
                <?php 
                   try {
                     $sql = "SELECT * FROM roles";
                     $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                        echo "Error" . $e->getMessage();
                      }

                     while ($roles = $resultado->fetch_assoc()) { 
                ?>
                    <option value="<?php echo $roles['ROLID'];?>" <? echo isset($usuario["ROLID"]) && $usuario["ROLID"] == $roles["ROLID"] ? "selected" : ""?>>
                        <?php echo $roles['DESCRIPCION']; ?>
                    </option>
                <?php }
                $conn->close();
                ?>
                </select>
            </div>
            
            
        </div>
        <!-- /.box-body -->