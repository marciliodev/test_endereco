<?php

    function get_endereco($cep){

        // formatar o cep removendo caracteres nao numericos
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);
        return $xml;
    }

    $endereco = (get_endereco("45000505"));
    //var_dump($endereco);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Busca de Endereços</title>
  <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  </head>
<body>

    <div class="form-group input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
    <input name="consulta" id="txt_consulta" placeholder="Consultar CEP" type="text" class="form-control">
    </div>

    <table id="tabela" class="table table-hover">
    <thead>
        <br>
        <tr>
            <th>CEP</th>
            <th>Logradouro</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
      <tr>
          <th><?php echo $endereco->cep ?></th>
          <td><?php echo $endereco->logradouro ?></td>
          <td><?php echo $endereco->bairro ?></td>
          <td><?php echo $endereco->localidade ?></td>
          <td><?php echo $endereco->uf ?></td>
      </tr>
  </tbody>
    
</body>
</html>

<script>
  $('input#txt_consulta').quicksearch('table#tabela tbody tr');
</script>


