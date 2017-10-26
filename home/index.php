<?php
    include_once '../class/principal.php';
    
    $usuario = new Usuario();
    
    $escola = new Escolas();
    
    $usuario->validaSessao();
    
    if ( !isset($_POST ["dre"])) {
        $dre        = $usuario->getDiretoria();        
    } else {
        $dre = $_POST ["dre"];
    }    
    $nome	= $_POST ["nome"];	    
    $cidade     = $_POST ["login"];
    $inep       = $_POST ["inep"];
?>
        <div class="col-xs-2">                        
            <form class="form-horizontal" method="post" action="">
             <div class="form-group">
               <div class="col-xs-10 col-xs-offset-2">
                <div class="form-group">
                  <label for="dre">Diretoria</label>
                  <input type="text" class="form-control" id="dre" name="dre" value="<?php echo $dre;?>">
                </div>
                <div class="form-group">
                  <label for="nome">Nome Escola</label>
                  <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome;?>">
                </div>
                <div class="form-group">
                    <label for="cidade">cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cidade;?>">
                </div>
                <div class="form-group">
                    <label for="inep">Código INEP</label>
                  <input type="text" class="form-control" id="inep" name="inep" value="<?php echo $inep;?>">
                </div>                
                  <a type="button" class="btn btn-danger"  href="">Limpar <span class="glyphicon glyphicon-erase"></span></a>                 
                  <button type="submit" class="btn btn-primary">Pesquisar <span class="glyphicon glyphicon-search"></span></button>                  
               </div>
             </div>  
            </form>
            <div class="col-xs-10 col-xs-offset-2">
                <label> Possui Item na Escola: <span class="glyphicon glyphicon-ok-circle btn-success"></label> 
                <label> Não Possui Item na Escola: <span class="glyphicon glyphicon-remove-circle btn-danger"></label> 
                <label> Sem Resposta Técnico: <span class="glyphicon glyphicon-ban-circle"></label>  
            </div>
        </div>
        <div class="col-xs-10">
            <div class="col-xs-12">
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                      <tr class="text-center">
                        <th>Diretoria</th> 
                        <th>Município</th>
                        <th>INEP</th>
                        <th>Nome Escola</th>
                        <th>Admin.</th>
                        <th>LTE</th>
                        <th>Wifi</th>
                        <th>Diário</th>
                        <th>Manut. Escola</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $escolas = $escola->listaEcolasP($dre,$cidade,$nome,$inep);
                            foreach ($escolas as $table_escolas){                                
                        ?>                
                    <tr>
                        <td class="text-center"><?php echo $table_escolas["diretoria"]; ?></td>
                        <td><?php echo $table_escolas["municipio"]; ?></td>
                        <td><?php echo $table_escolas["codigo_mec"]; ?></td>
                        <td><?php echo $table_escolas["nome"]; ?></td>
                        <td class="text-center"><?php echo $escola->imprimiSituacao($table_escolas["administrativo"]); ?></td>
                        <td class="text-center"><?php echo $escola->imprimiSituacao($table_escolas["laboratorio"]); ?></td>
                        <td class="text-center"><?php echo $escola->imprimiSituacao($table_escolas["wifi"]); ?></td>
                        <td class="text-center"><?php echo $escola->imprimiSituacao($table_escolas["diario"]); ?></td>
                        <td class="text-center"><?php echo '<a type="button" class="btn btn-primary" target="" href="../home/editescola.php?codigo='.$table_escolas["codigo_escola"].'"><span class="glyphicon glyphicon-edit"></span></a>';?></td>                        
                    </tr>  
                        <?php
                                }
                        ?>                                          
                    </tbody>
                </table>
            </div>
           </div>
        </div>   
<?php
include ("../class/footer.php");