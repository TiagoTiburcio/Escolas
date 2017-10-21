<?php
    include_once '../class/principal.php';
    
    $usuario = new Usuario();
    
    $escola = new Escolas();
    
    $usuario->validaSessao();
    $usuario->iniUsuario($_GET ["codigo"]);
?>
        <div class="col-xs-12 text-center">
            <h2>Atualizar Cadastro Escola</h2>
            <h2></h2>
            <form class="form-horizontal" method="post" action="gravaeditescola.php">
             <div class="form-group">
               <div class="col-xs-10 col-xs-offset-2">
                <div class="form-group">
                  <label for="inep">Código INEP MEC</label>
                  <input type="text" class="form-control" id="inep" name="inep" value="<?php echo $escola->getCodigoMec();?>">
                </div>   
                <div class="form-group">
                  <label for="dre">Diretoria</label>
                  <input type="text" class="form-control" id="dre" name="dre" value="<?php echo $escola->getDiretoria();?>">
                </div>
                <div class="form-group">
                  <label for="nome">Nome Escola</label>
                  <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $escola->getNome();?>">
                </div>
                <div class="form-group">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $escola->getMunicipio();?>">
                </div>                
                  <a type="button" class="btn btn-danger"  href="">Cancelar <span class="glyphicon glyphicon-erase"></span></a>                 
                  <button type="submit" class="btn btn-primary">Salvar <span class="glyphicon glyphicon-search"></span></button>                  
               </div>
             </div>  
            </form>
        </div>    
<?php
    include ("../class/footer.php");

