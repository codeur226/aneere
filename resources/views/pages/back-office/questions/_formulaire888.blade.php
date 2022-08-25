@csrf
           <!-- progressbar -->
           <ul id="progressbar">
            <li class="active">Fiche 0</li>
            <li>	Fiche 1</li>
            <li>Fiche 2</li>
            <li>Fiche 3</li>
            <li>Fiche 4</li>
            <li>Fiche 5</li>
            <li>Fiche 6</li>
        </ul>

        <div class="fieldset-container" id="fieldset-container">
 
           <fieldset>
            <h2 class="fs-title">Création de la collecte</h2>
            <div class="form-group">
                <span class="form-group has-float-label">
                  <input type="date" class="form-control" name="dateCollecte" placeholder="dateCollecter" />
                  <label for="dateCollecte">Date collecte</label>
                </span>
            </div>
              <div class="form-group">
                <span class="form-group has-float-label">
                  <input type="text" class="form-control" name="pointFocal" placeholder="pointFocalr" />
                  <label for="pointFocal">Point focal</label>
                </span>
              </div>
              <div class="form-group">
                <span class="form-group has-float-label">
                  <input type="number" class="form-control" name="telephone" placeholder="telephoner" />
                  <label for="telephone">Telephone</label>
                </span>
              </div>
            
            <input type="button"  name="next" onclick="sousQuestion(1)" class="next action-button" value="Suivant" />
        </fieldset>
        
        <fieldset>
          
            <h2 class='fs-title'>Question n°1</h2>
            <div class='row'>
              <h3  class='fs-subtitle'>Avez-vous un responsable énergie au sein de votre établissement?  </h3>
            </div>
          <div class='row'>
            <input type='checkbox' name='choix2'  id='action-chekbox-yes1' class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

            <input type='checkbox' name='choix2' id='action-chekbox-no1' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
          </div> 
          <div id="sousquestion1">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, quel est son rôle ?</h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt1" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
          </div>
          <hr>
            <input type='button' name='previous' class='previous action-button' value='Precedent' />
            <input type='button'  name='next' class='next action-button' value='Suivant' />
        </fieldset>

        <fieldset>
          
          <h2 class='fs-title'>Question n°2</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Votre bâtiment dispose-t-il d’un transformateur de tension ? </h3>
          </div>
        <div class='row'>
          <input type='checkbox' name='choix21'  id='action-chekbox-yes2' class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' name='choix22' id='action-chekbox-no2' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion2">
            <div class="row"> 
              <h3  class="fs-subtitle">Si oui, quelle est la puissance ?</h3>
            </div>
            <br> 
            <div class="form-group">
              <span class="form-group has-float-label">
                <input type="number" class="form-control" name="rt2" placeholder="puissance" />
                <label for="telephone">Puissance en KiloWattHeure(KWh)</label>
              </span>
            </div>
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset>
          
          <h2 class='fs-title'>Question n°3</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>	Quelle est la qualité de la fourniture d’électricité de votre établissement ? </h3>
          </div>
        <div class='row'>
          <input type='checkbox' name='choix31'  class='action-chekbox'><span style='padding-top: 7px;'> Bonne</span> 
          <input type='checkbox' name='choix32' class='action-chekbox'><span style='padding-top: 7px;'> Passable</span>
          <input type='checkbox' name='choix33' class='action-chekbox'><span style='padding-top: 7px;'> Mauvaise</span>
        </div>           
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>


      <fieldset>
          
          <h2 class='fs-title'>Question n°4</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Votre bâtiment dispose-t-il d’un système de compensation d’énergie réactive ? </h3>
          </div>
        <div class='row'>
          <input type='checkbox' name='choix41'  id='action-chekbox-yes4' class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' name='choix42' id='action-chekbox-no4' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion4">
        <div class="row"> 
          <h3  class="fs-subtitle">Si oui, quelle est la puissance ?</h3>
        </div>
        <br> 
        <div class="form-group">
          <span class="form-group has-float-label">
            <input type="number" class="form-control" name="rt4" placeholder="puissance" />
            <label for="telephone">Puissance en KiloWattHeure(KWh)</label>
          </span>
        </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset> 
        <h2 class='fs-title'>Question n°5</h2>
        <div class='row'>
          <h3  class='fs-subtitle' >Quels sont les types de commandes manuelles du système d’éclairage utilisés dans votre établissement?   </h3>
        </div>
       <div class='row' >
        <input type='checkbox' name='choix51' value='' class='action-chekbox'><span style='padding-top: 7px;'> Fluorescent  </span> 
        <input type='checkbox' name='choix52' class='action-chekbox'><span style='padding-top: 7px;'> Fluo compact  </span>
        <input type='checkbox' name='choix53' class='action-chekbox'><span style='padding-top: 7px;'> Lampe à incandescent   </span>
        <input type='checkbox' name='choix54' class='action-chekbox'><span style='padding-top: 7px;'> LED   </span>
        <input type='checkbox' name='choix55' class='action-chekbox'><span style='padding-top: 7px;'> Projecteur    </span>
        <input type='checkbox' name='choix56' class='action-chekbox'><span style='padding-top: 7px;'> Autre    </span>
       </div> 

        <!-- {{-- <div class="sousquestion">
       <div class="row"> 
        <h3  class="fs-subtitle">Si oui, quel est son rôle ?</h3>
      </div>
      <br> 
       <div class="form-group">
          <span class="form-group has-float-label">
           <textarea name="" type="text" class="form-control" cols="2" rows="2"></textarea>
            <label for="reponse">Reponse</label>
          </span>
        </div> 
      </div> --}} -->

       <hr>
        <input type='button' name='previous' class='previous action-button' value='Precedent' />
        <input type='button'  name='next' class='next action-button' value='Suivant' />
     </fieldset>


      <fieldset> 
        <h2 class='fs-title'>Question n°6</h2>
        <div class='row'>
          <h3  class='fs-subtitle'>Quels sont les types de commandes manuelles du système d’éclairage utilisés dans votre établissement?   </h3>
        </div>
       <div class='row'>
        <input type='checkbox' name='choix61'  class='action-chekbox'><span style='padding-top: 7px;'> Interrupteur Simple </span> 
        <input type='checkbox' name='choix62' class='action-chekbox'><span style='padding-top: 7px;'> Télérupteur </span>
        <input type='checkbox' name='choix63' class='action-chekbox'><span style='padding-top: 7px;'> Bouton Poussoir  </span>
        <input type='checkbox' name='choix64' class='action-chekbox'><span style='padding-top: 7px;'> Autres  </span>
       </div> 
       <!-- {{-- <div class="sousquestion">
       <div class="row"> 
        <h3  class="fs-subtitle">Si oui, quel est son rôle ?</h3>
      </div>
      <br> 
       <div class="form-group">
          <span class="form-group has-float-label">
           <textarea name="" type="text" class="form-control" cols="2" rows="2"></textarea>
            <label for="reponse">Reponse</label>
          </span>
        </div> 
      </div> --}} -->
       <hr>
        <input type='button' name='previous' class='previous action-button' value='Precedent' />
        <input type='button'  name='next' class='next action-button' value='Suivant' />
    </fieldset>
      
    <fieldset> 
        <h2 class='fs-title'>Question n°7</h2>
        <div class='row'>
          <h3  class='fs-subtitle'> Quels sont les types de commandes automatiques utilisés dans votre établissement? </h3>
        </div>
       <div class='row'>
        <input type='checkbox' name='choix71'  class='action-chekbox'><span style='padding-top: 7px;'> Détecteur de mouvement </span>

        <input type='checkbox' name='choix72' class='action-chekbox'><span style='padding-top: 7px;'> Interrupteur crépusculaire  </span>
        <input type='checkbox' name='choix73' class='action-chekbox'><span style='padding-top: 7px;'> Interrupteur horaire   </span>
       </div> 
       <hr>
        <input type='button' name='previous' class='previous action-button' value='Precedent' />
        <input type='button'  name='next' class='next action-button' value='Suivant' />
    </fieldset>

    <fieldset>
          
          <h2 class='fs-title'>Question n°8</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>	Avez-vous déjà fait une analyse de la consommation (Facture d’électricité)  de votre établissement ? </h3>
          </div>
        <div class='row'>
          <input type='checkbox' name='choix81' id='action-chekbox-yes8' class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' name='choix82' id='action-chekbox-no8' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div>
          <div class="row"> 
            <h3  class="fs-subtitle"><span id="option81">Si oui, par qui et quel constat avez-vous fait ?</span> <span id="option82"> Si non, pourquoi ? </span></h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt8" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset>
          
          <h2 class='fs-title'>Question n°9</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Disposez-vous de vos factures d’électricités des trois (03) derniers années ?. Si oui, nous demandons une copie  </h3>
          </div>
        <div class='row'>
          <input type='checkbox' id='action-chekbox-yes9' name='choix91'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' id='action-chekbox-no9' name='choix92' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
       
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset>
          
          <h2 class='fs-title'>Question n°10</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Avez-vous déjà entrepris des démarches volontaristes pour la réduction de votre consommation ? </h3>
          </div>
        <div class='row'>
          <input type='checkbox' id='action-chekbox-yes10' name='choix101'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' id='action-chekbox-no10' name='choix102' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion10">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, lesquelles et quels résultats avez-vous obtenu :  </h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt10" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>


      <fieldset>
          
          <h2 class='fs-title'>Question n°11</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Connaissez-vous le concept d’économie d’énergie ? </h3>
          </div>
        <div class='row'>
          <input type='checkbox'  id='action-chekbox-yes11' name='choix111'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox'  id='action-chekbox-no11' name='choix112' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion11">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, expliquez  </h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt11" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>


      <fieldset>
          
          <h2 class='fs-title'>Question n°12</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Connaissez-vous le concept d’efficacité énergétique ?  </h3>
          </div>
        <div class='row'>
          <input type='checkbox'  id='action-chekbox-yes12' name='choix121'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox'  id='action-chekbox-no12' name='choix122' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion12">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, expliquez </h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt12" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset>
          
          <h2 class='fs-title'>Question n°13</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Connaissez-vous le concept d’Eco citoyenneté ?  </h3>
          </div>
        <div class='row'>
          <input type='checkbox'  id='action-chekbox-yes13' name='choix131'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox'  id='action-chekbox-no13' name='choix132' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion13">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, expliquez </h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt13" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset>
          
          <h2 class='fs-title'>Question n°14</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Faites-vous un suivi de votre consommation d’électricité ?  </h3>
          </div>
        <div class='row'>
          <input type='checkbox'  id='action-chekbox-yes14' name='choix141'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox'  id='action-chekbox-no14' name='choix142' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion14">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, comment </h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt14" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset>
          
          <h2 class='fs-title'>Question n°15</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Avez-vous des affiches près des interrupteurs avec des messages du genre « Eteignez en quittant le local » ? </h3>
          </div>
        <div class='row'>
          <input type='checkbox'  id='action-chekbox-yes15' name='choix151'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox'  id='action-chekbox-no15' name='choix152' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>

      <fieldset> 
        <h2 class='fs-title'>Question n°16</h2>
        <div class='row'>
          <h3  class='fs-subtitle'>	Le personnel a-t-il déjà été sensibilisé à l’utilisation rationnelle de l’énergie ? </h3>
        </div>
      <div class='row'>
        <input type='checkbox' name='choix161' id='action-chekbox-yes16' class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

        <input type='checkbox' name='choix162' id='action-chekbox-no16' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
      </div> 
      <div>
        <div class="row"> 
          <h3  class="fs-subtitle"><span id="option161">Si oui, quel impact avez-vous constaté ?</span> <span id="option162"> Si non, pourquoi ? </span></h3>
        </div>
        <br> 
        <div class="form-group">
            <span class="form-group has-float-label">
            <textarea name="rt16" type="text" class="form-control" cols="2" rows="2"></textarea>
              <label for="reponse">Reponse</label>
            </span>
          </div> 
      </div>
      <hr>
        <input type='button' name='previous' class='previous action-button' value='Precedent' />
        <input type='button'  name='next' class='next action-button' value='Suivant' />
    </fieldset>

      <fieldset>
          
          <h2 class='fs-title'>Question n°17</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Avez-vous un dispositif d’alimentation de secours autre que le solaire?</h3>
          </div>
        <div class='row'>
          <input type='checkbox' id='action-chekbox-yes17' name='choix171'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' id='action-chekbox-no17' name='choix172' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion17">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, lesquels et précisez la puissance</h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="rt17" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>
      <fieldset> 
        <h2 class='fs-title'>Question n°18</h2>
        <div class='row'>
          <h3  class='fs-subtitle'>	Disposez-vous d’une installation solaire photovoltaïque pour votre bâtiment ? </h3>
        </div>
      <div class='row'>
        <input type='checkbox' name='choix181' id='action-chekbox-yes18' class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

        <input type='checkbox' name='choix182' id='action-chekbox-no18' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
      </div> 
      <div>
        <div class="row"> 
          <h3  class="fs-subtitle"><span id="option181">Si oui quelle est sa capacité et quel constat avez-vous fait ?</span> <span id="option182"> Si non, pourquoi ?  </span></h3>
        </div>
        <br> 
        <div class="form-group">
            <span class="form-group has-float-label">
            <textarea name="rt18" type="text" class="form-control" cols="2" rows="2"></textarea>
              <label for="reponse">Reponse</label>
            </span>
          </div> 
      </div>
      <hr>
        <input type='button' name='previous' class='previous action-button' value='Precedent' />
        <input type='button'  name='next' class='next action-button' value='Suivant' />
    </fieldset>




       
            {{-- <h3  class="fs-subtitle">. Pouvons-nous visiter (noter les observations) ?. </h3> --}}
           

      <fieldset>
          
          <h2 class='fs-title'>Question n°19</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Le toit est-il accessible ?   </h3>
          </div>
        <div class='row'>
          <input type='checkbox' id='action-chekbox-yes19' name='choix191'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' id='action-chekbox-no19' name='choix192' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion19">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, vérifiez (noter les observations) </h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='submit'  name='next' class='submit action-button' value='Enregistrer' />
      </fieldset>













        </div>
{{--
</div>
    <div class="btn-list text-center">
        <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
        <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
    </div>
 --}} 