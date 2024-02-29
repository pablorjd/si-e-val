<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function getDataUser($Rut,$Lugar){

		#$this->db->select('m.Ico,m.IdSeccion,s.Seccion,m.IdModulo,mu.IdUsuario,m.Modulo,m.UrlModulo,m.OnlyRoot,s.IcoSeccion');
		#$this->db->join('ModuloUsuario mu','m.IdModulo=mu.IdModulo and mu.IdUsuario='.$IdUser,'left');	
		$dbConeccion = $this->load->database('default', TRUE);
		
		$dbConeccion->where('rut',$Rut);

		if($Lugar==1){

		}


		$dbConeccion->where('cd_repar',1034);
		#$dbConeccion->where('cd_depto',116);


		$query=$dbConeccion->get('personaldgtm.dbo.Vi_personal_web');
		
		if($query->num_rows()>0){
			return $query->row();
		}
	}

	public function getFizcalidadoresDeptos(){

		$dbConeccion = $this->load->database('ControlAccesoEscritura', TRUE);

		$query=$dbConeccion->query("select DISTINCT
	
			f.NRRutFiscalizador,
			pe.gl_mail,


		STUFF(
			(
				select CDDepto
				from PersonalDGTM.dbo.deptos d 
				join Fiscalizador f2 on f2.CDDepto=d.cd_depto
				where f2.FCTermino is null and f2.NRRutFiscalizador=f.NRRutFiscalizador
				order by f.NRRutFiscalizador
				FOR XML PATH ('')
			)
			,1,0,''
		) AS DeptosXML

		from Fiscalizador f
		join personaldgtm.dbo.Vi_personal_web pe on pe.rut=f.NRRutFiscalizador
		where f.FCTermino is null
		order by f.NRRutFiscalizador");

		if($query->num_rows()>0){
			return $query->result();
		}


    }
    
    #################################
    #    Creado Por Carlos Alvarez (05-08-2015)....
    #    Descripcion: Funciones Estandar para optimizar el tiempo de Desarrollo.
    #
    #
    #################################

    public function _sql($Table, $Where = '', $Orden = '', $Limit = '', $Conn = 'default')
    {

        $dbConeccion = $this->load->database($Conn, true);

        if ($Orden) {
            $dbConeccion->order_by($Orden);
        }

        if ($Limit) {
            $dbConeccion->limit($Limit);
        }

        if ($Where) {
            foreach ($Where as $key => $w) {
                if ($key) {
                    $dbConeccion->where($key, $w);
                } else {
                    $dbConeccion->where($w);
                }
            }
        }

        $query = $dbConeccion->get($Table);
        //echo '<br>'. $dbConeccion->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function _select($Table, $Where, $Conn = 'ControlAccesoEscritura', $Orden = '')
    {
        $dbConeccion = $this->load->database($Conn, true);
        if ($Where) {
            foreach ($Where as $key => $w) {
                if ($key) {
                    $dbConeccion->where($key, $w);
                } else {
                    $dbConeccion->where($w);
                }
            }
        }
        if ($Orden) {
            $dbConeccion->order_by($Orden);
        }
        $query = $dbConeccion->get($Table);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function _selectCount($Table, $Where, $Conn = 'ControlAccesoEscritura')
    {

        $dbConeccion = $this->load->database($Conn, true);
        if ($Where) {
            foreach ($Where as $key => $w) {
                if ($key) {
                    $dbConeccion->where($key, $w);
                } else {
                    $dbConeccion->where($w);
                }
            }
        }
        $dbConeccion->select('count(*) as Cont');
        $query = $dbConeccion->get($Table);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function _selectMax($Table, $IdCampo)
    {
        $this->db->select_max($IdCampo, 'MaximoId');
        $query = $this->db->get($Table);
        $this->LastQuery();

        if ($query->num_rows() > 0) {
            return $query->row()->MaximoId;
        }
    }

    public function _Correlativo($Table, $IdCampo)
    {
        $this->db->select_max($IdCampo, 'Correlativo');
        $query = $this->db->get($Table);
        $this->LastQuery();

        if ($query->num_rows() > 0) {
            return $query->row()->Correlativo + 1;
        }
    }

    public function _SaveData($Table, $Array, $Where, $opc, $MaxChange = '', $Conn = 'default')
    {

        $dbConeccion = $this->load->database($Conn, true);

        if ($opc == 1) {
            //echo var_dump($Array);
            $dbConeccion->insert($Table, $Array);
            // echo $dbConeccion->last_query();
            return $dbConeccion->insert_id();
        } else {
            //$dbConeccion->where($Where);
            if ($Where) {
                foreach ($Where as $key => $w) {
                    if ($key) {
                        $dbConeccion->where($key, $w);
                    } else {
                        $dbConeccion->where($w);
                    }
                }
            }

            $dbConeccion->update($Table, $Array);
            // echo $dbConeccion->last_query();
            if ($MaxChange) {
                return $MaxChange;
            } else {
                return '';
            }
        }
    }

    public function _Delete($table, $where, $Conn)
    {
        $dbConeccion = $this->load->database($Conn, true);
        $dbConeccion->where($where);
        $dbConeccion->delete($table);
    }

    private function LastQuery()
    {
        return $this->db->last_query();
    }

    

}

/* End of file Login_model.php */
