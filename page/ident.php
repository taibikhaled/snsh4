
            <div class="col-xl-2 col-lg-2 m-1 p-2 font-weight-bold text-primary card shadow border border-left-primary  align-items-center text-center ">
               
               <?php 
                 
                 echo '      <img src="'.$image.'" width="50%" ><h6 class="mt-4">'.$nom.'</h6> ' ;
                                     
               ?>
                             
            </div>

            <div class="col-xl-9 col-lg-9 m-1 p-3 font-weight-bold text-primary card shadow border border-left-primary  ">

                 
             <table>
               <tr><td>Matricule : </td><td><h6 class="m-2 text-dark"> <?php print $matricule?> </h6></td></tr>
               <tr><td>Date de Rectrutement : </td><td><h6 class="m-2 text-dark"> <?php print $dat?> </h6></td></tr>
               <tr><td>Etablissement : </td><td><h6 class="m-2 text-dark"> <?php print $fonc?> </h6></td></tr>
               <tr><td>Filière | Spécialité : </td><td><h6 class="m-2 text-dark"> <?php print $struc?> </h6></td></tr>
             </table>


             </div>