<?php
	
	class Formatter 
	{
	
	  public static function stringToDate($data) 
	  {
	    $data = str_replace('/', '-', $data);
	    return date('Y-m-d',strtotime($data));
	  }
	
	  public static function dateToString($data)
	  {
	    return date('d/m/Y',strtotime($data));
	  }
	
	  public static function getDataFormatada($data) 
	  {
	    return date('d/m/Y',strtotime($data));
	  }
	
	  public static function getDataHoraFormatada($dataHora) 
	  {
	    return date('d/m/Y H:i:s',strtotime($dataHora));
	  }
	
	  public static function getValorFormatado($valor)
	  {
	    if(is_numeric($valor))
	      return 'R$ ' . number_format($valor,'2',',','.'); 
	    else
	      return 'R$ ' . $valor;
	  }
	
	  public static function getValor($valor)
	  {
	    if(is_numeric($valor))
	      return number_format($valor,'2',',','.'); 
	    else
	      return $valor;
	  } 
	
	  public static function getValorBD($valor)
	  {
	    $valor = str_replace("R$ ", "", $valor);
	    $valor = str_replace(".", "", $valor);
	    $valor = str_replace(",", ".", $valor);
	    return $valor; 
	  }
	
	  public static function getDataPorExtensoAbreviada($data) 
	  {
	    setlocale(LC_ALL,'pt_BR.utf8');
	    return utf8_encode(ucfirst(strftime('%a %d/%m',strtotime($data))));
	  }
	
	  public static function getDataPorExtenso($data) 
	  {
	    setlocale(LC_ALL,'pt_BR.utf8');
	    return utf8_encode(strftime('%d/%m/%Y - %A',strtotime($data)));
	  } 
	
	  public static function getMesPorExtenso($data)
	  {
	    setlocale(LC_ALL,'pt_BR.utf8');
	    return utf8_encode(ucfirst(strftime('%B de %Y',strtotime($data))));
	  }
	
	  public static function getMesExtenso($data)
	  {
	    setlocale(LC_ALL,'pt_BR.utf8');
	    return utf8_encode(ucfirst(strftime('%B',strtotime($data))));
	  }
	
	  public static function getPorcentagemFormatada($valor)
	  {
	    return number_format($valor,'2',',','.'); 
	  }
	  public static function getStatusSimNao($status)
	  {
	    if($status == 1){
	    	return "Sim";
	    } else {
			return "Não";
	    }
	  }
	
	  public static function mask($val, $mask)
	  {
	
	    // $cnpj = "11222333000199";
	    // $cpf = "00100200300";
	    // $cep = "08665110";
	    // $data = "10102010";
	    // echo mask($cnpj,'##.###.###/####-##');
	    // echo mask($cpf,'###.###.###-##');
	    // echo mask($cep,'#####-###');
	    // echo mask($data,'##/##/####');
	
	    $maskared = '';
	    $k = 0;
	    for($i = 0; $i<=strlen($mask)-1; $i++)
	    {
	      if($mask[$i] == '#')
	      {
	        if(isset($val[$k]))
	        $maskared .= $val[$k++];
	      }
	      else
	      {
	        if(isset($mask[$i]))
	        $maskared .= $mask[$i];
	      }
	    }
	    return $maskared;
	  } 

	  public static function dateDbToString($data) 
	  {
	  	if(!empty($data)){
	  		$data = explode(' ', $data);
		    $data = $data[0];
		    $data = explode('-', $data);
		    $data = $data[2]."/".$data[1]."/".$data[0];
		    return $data;
	  	}
	  }
	  public static function dataAtualDBPlusDays($days)
	  {
		return date("d/m/Y", strtotime("+".$days." days"));
	  }
	  public static function dataAtual()
	  {
	    return date('d/m/Y');
	  }
	}