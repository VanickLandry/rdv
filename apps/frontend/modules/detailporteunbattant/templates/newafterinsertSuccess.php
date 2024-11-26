<h1>Nouvelle Vente</h1>
<br />
<?php include_partial('mirroir/form', array('form' => $form)) ?>



<td colspan="2" > <br> <div class="crd_mng_text_02" > Produits de cette Transaction  </div> </td>
                <?php               
               # get results
               // $rd_detail_mirroirs = $rd_detail_mirroirs->getId();
               $rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir');
			  # order by and  fetch results                           
                foreach ( $rd_detail_mirroirs as $detailvente ): ?>
                <?php 
                $b_show_row = true;
                // if  (  !$detailvente->getIsActive() )
                if  (  $detailvente->getLongueur() )
                {
                    $b_show_row = $detailvente->getLongueur() ;
                }                
                if ($b_show_row)
                {
                ?>
                <tr class="<?php ///echo fmod($i, 2) ? 'even' : 'odd' ?>" >
                  <td class="crd_mng_td_01_01"><a class="crd_mng_lnk_02" href="<?php echo url_for('mldetailvente/show?id='.$detailvente->getId()) ?>">
				  <?php echo $detailvente->getLongueur() ?></a>&nbsp;&nbsp;
				  
				  </br>
                  </td>
                 </tr>                
                <?php 
                }  
                ?>
                <?php endforeach; ?>





