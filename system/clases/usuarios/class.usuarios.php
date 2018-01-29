<?php

  /**
   * Clase para registrar
   */
  class UsuariosModel {

    public function registrarUsuario($usuario,$contrasena,$nombre,$apellido, $correo, $cedula){
        $conexion = new Conexion;
        $conectar = $conexion->obtenerConexionMy();
        $sql = "SELECT * FROM persona WHERE per_correo = '$correo'";
        $preparar = $conectar->prepare($sql);
        $preparar->execute();
        $num_row = $preparar->fetchAll();
        if (count($num_row) > 0){
            return "Ya existe un usuario con este correo asignado";
        } else {
            $sql = "INSERT INTO usuarios (Cedula, Usuario, contrasena, Tipo, Nivel, Registro, Fecha) VALUES (:Cedula,:Usuario,:contrasena,:Tipo,:Nivel,:Registro,now())";
            $preparar = $conectar->prepare($sql);
            $preparar->bindValue(':Cedula',$cedula);
            $preparar->bindValue(':Usuario',$usuario);
            $preparar->bindValue(':contrasena',md5($contrasena));
            $preparar->bindValue(':Tipo','Alumno');
            $preparar->bindValue(':Nivel','3');
            $preparar->bindValue(':Registro','1');
            if (!$preparar) {
                return "Error no pudo registrar el usuario";
            }else{
                $preparar->execute();
                $sql = "INSERT INTO persona (per_cedula, per_nombres, per_apellidos, per_correo) VALUES (:Cedula,:Nombre,:Apellido, :Correo)";
                $preparar_p = $conectar->prepare($sql);
                $preparar_p->bindValue(':Cedula',$cedula);
                $preparar_p->bindValue(':Nombre',$nombre);
                $preparar_p->bindValue(':Apellido',$apellido);
                $preparar_p->bindValue(':Correo',$correo);
                if (!$preparar_p) {
                    return "Error no pudo registrar el usuario";
                }else{
                    $preparar_p->execute();
                    return "Su cuenta ha sido registrada exitosamente";
                }
            }
        }
    } 
    public function comprobarCedulaUsu($cedula){
      $conexion = new Conexion;
      $conectar = $conexion->obtenerConexionMy();
      $sql = "SELECT * FROM usuarios WHERE Cedula = '$cedula'";
      $preparar = $conectar->prepare($sql);
      $preparar->execute();
      $num_row = $preparar->fetchAll();
      if (count($num_row) > 0){
        return true;
      }else {
        return false;
      }
    }

    public function comprobarCedulaAsoc($cedula){
      $conexion = new Conexion;
      $conectar = $conexion->obtenerConexionMy();
      $sql = "SELECT * FROM asoc WHERE CEDULA = '$cedula'";
      $preparar = $conectar->prepare($sql);
      $preparar->execute();
      $num_row = $preparar->fetchAll();
		$sql = "SELECT * FROM registrados WHERE cedula = $cedula";
      $prepararrg = $conectar->prepare($sql);
      $prepararrg->execute();
      $num_rowrg = $prepararrg->fetchAll();

      if (count($num_row) > 0 || count($num_rowrg) > 0) {
        return true;
      }else {
        return false;
      }
    }

    public function validaUsu($usuario){
      $conexion = new Conexion;
      $conectar = $conexion->obtenerConexionMy();
      $sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario'";

      $preparar = $conectar->prepare($sql);
      $preparar->execute();
      $num_row = $preparar->fetchAll();

      if (count($num_row) > 0) {
        return true;
      }else {
        return false;
      }
    }

    /**
    * Metodo para mostrar los datos personales de la persona que
    * inicio sesion
    */
    public function datosUsuario($cedula){
      $conexion = new Conexion;
      $conectar = $conexion->obtenerConexionMy();
      $sql = "SELECT * FROM asoc WHERE CEDULA = '$cedula'";
      $preparar = $conectar->prepare($sql);
      $preparar->execute();
      $array = $preparar->fetch(PDO::FETCH_ASSOC);
      return $array;
    }
	public function TotalPrestamo(){
		$cedula = $_SESSION[ci];
		$deuda = paraTodos::arrayConsulta("sum(SOLICITADO) as solicitado", "prest", "CEDULA=$cedula");
		foreach($deuda as $row){
			$totdeuda = $row[solicitado];
		}
		echo number_format ( $totdeuda,2, ',','.' );
	}
	 public function Deudas(){
		$cedula = $_SESSION[ci];
		$deuda = paraTodos::arrayConsulta("min(an.RESTA) as resta", "amort_nor an, prest p", "an.PREST=p.ID and p.CEDULA=$cedula and an.RESTA>0
group by an.PREST
order by an.RESTA asc");
		 $totdeuda = 0;
		 foreach($deuda as $row){
			$totdeuda = $totdeuda+$row[resta];
		 }
		echo number_format ( $totdeuda,2, ',','.' );
	 }
	  public function Cuotas(){
		$cedula = $_SESSION[ci];
		$deuda = paraTodos::arrayConsulta("count(an.PREST) as cuotas ", "amort_nor an, prest p", "an.PREST=p.ID and p.CEDULA= $cedula and an.CANC=0");
		foreach($deuda as $row){
			$totdeuda = $row[cuotas];
		}
		echo $totdeuda;
	 }
  }
 ?>