<?php
require_once 'DataBase.php';
class Productos extends DataBase {
    protected $response;
    
    public function __construct($dbName, $response = []) {
        parent::__construct($dbName);
        $this->response = $response;
    }

    public function getResponse() {
        return json_encode($this->response);

    }

    public function task() {
        $query = "SELECT * FROM products";
        $result = $this->conexion->query($query);
        $this->response = $result->fetch_all(MYSQLI_ASSOC);
    }

    public function add($nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen) {
        $sql = "INSERT INTO products VALUES (null, '$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen', 0)";
        if($this->conexion->query($sql)){
            $this->response = [
                'status'  => 'success',
                'message' => 'Producto agregado'
            ];
        } else {
            $this->response = [
                'status'  => 'error',
                'message' => 'No se pudo agregar el producto'
            ];
        }
    }

    public function delete($id) {
        $query = "DELETE FROM products WHERE id = $id";
        $result = $this->conexion->query($query);
        if ($result) {
            $this->response = [
                'status'  => 'success',
                'message' => 'Producto eliminado correctamente'
            ];
        } else {
            $this->response = [
                'status'  => 'error',
                'message' => 'No se pudo eliminar el producto'
            ];
        }
    }
    
    public function edit($id, $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen) {
        $sql_1 = "SELECT * FROM products WHERE id = '{$id}' and nombre = '{$nombre}' and marca = '{$marca}' and modelo = '{$modelo}' and precio = {$precio} and detalles = '{$detalles}' and unidades = {$unidades} and imagen = '{$imagen}'";
        $res = $this->conexion->query($sql_1);
    
        if ($res->num_rows == 0) {
            $sql = "UPDATE products SET nombre = '{$nombre}', marca = '{$marca}', modelo = '{$modelo}', precio = {$precio}, detalles = '{$detalles}', unidades = {$unidades}, imagen = '{$imagen}' WHERE id = '{$id}'";
            if($this->conexion->query($sql)){
                $this->response = [
                    'status'  => 'success',
                    'message' => 'Producto actualizado'
                ];
            } else {
                $this->response = [
                    'status'  => 'error',
                    'message' => 'No se pudo actualizar el producto'
                ];
            }
        } else {
            $this->response = [
                'status'  => 'success',
                'message' => 'Los datos son iguales'
            ];
        }
    }
    
    
    public function list() {
        $query = "SELECT * FROM products";
        $result = $this->conexion->query($query);
    
        if(!$result){
            die('Query failed'. mysqli_error($this->conexion));
        }
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'marca' => $row['marca'],
                'modelo' => $row['modelo'],
                'precio' => $row['precio'],
                'detalles' => $row['detalles'],
                'unidades' => $row['unidades'],
            );
        }
        $this->response = $json;
    }
    
    public function search($search) {
        $sql = "SELECT * FROM products WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
        $result = $this->conexion->query($sql);
    
        if ($result) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
    
            if (!is_null($rows)) {
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $rows[$num][$key] = utf8_encode($value);
                    }
                }
            }
    
            $this->response = $rows;
        } else {
            $this->response = [
                'status' => 'error',
                'message' => mysqli_error($this->conexion)
            ];
        }
    }
    
    public function single($id) {
        $sql = "SELECT * FROM products WHERE id = {$id}";
        $result = $this->conexion->query($sql);
    
        if ($result) {
            $row = $result->fetch_assoc();
    
            $this->response = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'marca' => $row['marca'],
                'modelo' => $row['modelo'],
                'precio' => $row['precio'],
                'detalles' => $row['detalles'],
                'unidades' => $row['unidades'],
                'imagen' => $row['imagen']
            ];
        } else {
            $this->response = [
                'status' => 'error',
                'message' => mysqli_error($this->conexion)
            ];
        }
    }
    
    

}
?>