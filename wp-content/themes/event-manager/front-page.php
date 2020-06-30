<?php
/**
 * New Front Page
 * TFJ - 14/06/18
 */


// set full width layout

add_filter ( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


// remove Genesis default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );

function show_my_header () { ?>

<img src="https://www.salonamiante.fr/wp-content/uploads/2018/06/header-new-home.jpg" alt="">

<?php }

// Move Event Information inside #inner
remove_action( 'genesis_after_header', 'cs_event_description' );
add_action( 'genesis_after_header', 'show_my_header' );

function show_my_new_body(){?>
<div id="new-home" >
    <section id="intro">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-6 bg-gold text-center">
                    <a class="tittle-padding-both" href="https://www.salonamiante.fr/go/exposer-au-spa-paris/"><h2 class="font-white "><strong>EXPOSER</strong></h2></a>
                </div>
                <div class="col-md-6 bg-red text-center">
                    <a class="tittle-padding-both" href="#visiter"><h2 class="font-white "><strong>VISITER</strong></h2></a>
                </div>
            </div>
            <!-- Start bloc visiter-->

            <div id="visiter" class="">
                <div class="row bloc-padding text-center bg-red">
                    <div class="col-md-3 bg-red" style="border-right: 1px solid #fff;">
                        <h3 class="font-white title-padding-bottom">ADRESSE</h3>
                        <div class="sub-line bg-white"></div>
                        <p class="font-white">PARIS EVENT CENTER</p>
                        <p class="font-white">20 Avenue de la Porte de la Vilette, <br> 75019 Paris</p>
                    </div>
                    <div class="col-md-3 bg-red" style="border-right: 1px solid #fff;">
                        <h3 class="font-white title-padding-bottom">CONTACT</h3>
                        <div class="sub-line bg-white"></div>
                        <p class="font-white"><a href="mailto:contact@salonamiante.fr" class="font-white">contact@salonamiante.fr</a></p>
                        <p class="font-white">09 72 54 94 48</p>
                    </div>
                    <div class="col-md-3 bg-red" style="border-right: 1px solid #fff;">
                        <h3 class="font-white title-padding-bottom">DATES</h3>
                        <div class="sub-line bg-white"></div>
                        <p class="font-white">Mardi 12 Septembre 2018</p>
                        <p class="font-white">Mercredi 13 Septembre 2018</p>
                    </div>
                    <div class="col-md-3 bg-red">
                        <h3 class="font-white title-padding-bottom">HORAIRE</h3>
                        <div class="sub-line bg-white"></div>
                        <p class="font-white">09h00 - 18h00</p>
                    </div>
                </div>
                <div class="row bloc-padding text-center bg-red">
                   <div class="col-md-12 center-block">
                       <h3 class="font-white title-padding-bottom">LES INSCRIPTIONS SONT OUVERTES !</h3>
                         <a href="https://salonamianteparis2018.site.calypso-event.net/visiteur.htm" class="btn-hover-green"><button class="btn btn-violet">JE COMMANDE MON BADGE</button></a>
                   </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="row">
            <div id="banner">
                <?php /*echo adrotate_group(1); */?>   
            </div>
        </div>
        <div class="spacer"></div>
        <div class="container bloc-padding">
            <div class="row">
                <img src="https://www.salonamiante.fr/wp-content/uploads/2018/06/animation-logo-spa.gif" alt="" class="col-md-3">
                <h2 class="col-md-9 text-center">Le <strong><span class="font-red">S</span>alon des <span class="font-red">P</span>rofessionnels de l'<span class="font-red">A</span>miante</strong>, numéro 1 en France de la filière de l'amiante, est heureux de vous retrouver pour sa 4 <sup>ième</sup> édition</h2>
            </div>
            <div class="spacer"></div>
            <div class="row bloc-padding text-center">
                <h3> Le <span class="font-red">SPA</span> PARIS, c’est l’expertise et un savoir-faire dédié, concentrés sur un salon unique en France, pour comprendre les dernières obligations réglementaires, les dernières évolutions et découvrir les solutions innovantes en matière de prévention des risques et de décontamination.</h3>
            </div>
            <div class="spacer"></div>
            <!--<div class="row text-center">
<div class="col-md-4 bg-soft-gray bloc-padding" style="min-height:140px;">
<h4><strong>UN ESPACE RESTAURATION</strong></h4>
<p>Un espace traiteur sera mis à votre disposition durant les 2 jours de salon, pour vous servir et vous accueillir.</p>
</div>
<div class="col-md-4 bg-light-gray bloc-padding" style="min-height:140px;">
<h4><strong>UN ESPACE PRESSE</strong></h4>
<p>Un espace presse sera mis en place pour lire ou découvrir les magazines incontournables de la filière amiante.</p>
</div>
<div class="col-md-4 bg-soft-gray bloc-padding" style="min-height:140px;">
<h4><strong>UN ESPACE PROFESSIONNEL</strong></h4>
<p>Un espace professionnel sera mis à votre disposition pour échanger et travailler dans un endroit calme durant la durée du salon.</p>
</div>
<div class="col-md-4 bg-light-gray bloc-padding" style="min-height:140px;">
<h4><strong>UN ESPACE CONFÉRENCE</strong></h4>
<p>Vous aurez la possibilité d'assister à des conférences sur des thèmes qui vous concernent.</p>
</div>
<div class="col-md-4 bg-soft-gray bloc-padding" style="min-height:140px;">
<h4><strong>UN ESPACE ATELIER</strong></h4>
<p>Pour participer aux ateliers proposés par les exposants du salon, en comité restreint afin de maximiser les échanges entre professionnels.</p>
</div>
<div class="col-md-4 bg-light-gray bloc-padding" style="min-height:140px;">
<h4><strong>UN ESPACE DÉTENTE</strong></h4>
<p>Un espace détente sera mis à votre disposition pour vous relaxer et recherger vos batteries à tout moment durant la durée du salon.</p>
</div>
</div>-->                
        </div>
        <div class="spacer-section"></div>
    </section>
    <section id="nouveautes">
        <div class="container-fluid bg-red text-center">
            <div class="row bloc-padding">
                <h2 class="title-padding-both font-white">TOUTES LES NOUVEAUTÉS DU SPA</h2>
                <div class="sub-line bg-white"></div>
                <div class="spacer"></div>
            </div>
            <div class="row bloc-padding">
                <div class="col-md-6">                            
                    <img src="https://www.salonamiante.fr/wp-content/uploads/2018/06/a-la-une-trophée-innovation-amiante.jpg" alt="Trophée de l'Innovation Amiante 2018 SPA PARIS" class="img-responsive center-block">
                    <a href="https://www.salonamiante.fr/go/trophee-innovation-amiante/" class="center-block title-padding-both btn-hover-green"><button class="btn btn-violet">PARTICIPEZ</button></a>
                </div>
                <div class="col-md-6">
                    <img src="https://www.salonamiante.fr/wp-content/uploads/2018/06/a-la-une-espaces-pro.jpg" alt="Des espaces d'affaires sur le SPA PARIS 2018" class="img-responsive center-block">
                    <a href="https://www.salonamiante.fr/go/des-espaces-pro/" class="center-block title-padding-both btn-hover-green"><button class="btn btn-violet">S'INSCRIRE</button></a>
                </div>
            </div>
        </div>
    </section>
    <section id="actus">
        <div class="container-fluid bg-violet text-center">
            <div class="row bloc-padding">
                <h2 class="title-padding-both font-white">LES ACTUS DU SPA</h2>
                <div class="sub-line bg-white"></div>
                <div class="spacer"></div>
                <div class="col-md-4">           
                    <h3 class="title-padding-bottom font-white">VIDÉO À LA UNE</h3>
                    <div class="videos-a-la-une">
                        <div class="embed-responsive embed-responsive-16by9" >
                            <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/ttuYHUi2ETw"></iframe>
                        </div>
                        <div class="spacer"></div>
                        <div class="embed-responsive embed-responsive-16by9" >
                            <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/axcwQsSnTE0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="title-padding-bottom font-white">IMAGES  À LA UNE</h3>
                    <div class="images-a-la-une">
                        <a href="https://www.salonamiante.fr/spa-marseille-2018-diaporama/"><img src="https://www.salonamiante.fr/wp-content/uploads/2018/06/retour-image-marseille.jpg" alt="Retour en image sur la 1ère édition du SPA MARSEILLE 2018" class="img-responsive center-block"></a>
                        <div class="spacer"></div>
                        <a href="http://www.salonamiante.fr/edition-2017-retour-image/"><img src="http://www.salonamiante.fr/wp-content/uploads/2017/09/edition-nationale-2017.jpg" alt="Retour en image sur sur l'édition 2017 du SPA PARIS" class="img-responsive center-block"></a>
                        <div class="spacer"></div>
                        <a href="http://www.salonamiante.fr/edition-2016-retour-en-image/"><img src="https://www.salonamiante.fr/wp-content/uploads/2017/09/retour-images-2016.jpg" alt="Retour en image sur l'édition 2016 du SPA PARIS" class="img-responsive center-block"></a>
                    </div>
                </div> 
                <div class="col-md-4">
                    <h3 class="title-padding-bottom font-white">SUIVEZ-NOUS EN RÉGION</h3>
                    <a href="https://www.salonamiante.fr/wp-content/uploads/2017/02/Encart-SPAN.jpg"><img src="https://www.salonamiante.fr/wp-content/uploads/2017/02/Encart-SPAN.jpg" alt="Retrouvez le SPA en régions" class="img-responsive center-block"></a>
                </div>           
            </div>
            <div class="spacer-section"></div>
        </div>
    </section>
    <!-- <section id="programme">
<div class="container-fluid bg-violet">
<div class="row bloc-padding">
<h2 class="title-padding-both font-white text-center">LES CONFÉRENCES ET ATELIERS DU SPA</h2>
<div class="sub-line bg white"></div>
<div class="spacer"></div>
<div class="col-md-4">
<h3 class="font-white title-padding-bottom text-center">S'INFORMER, DÉBATTRE</h3> 
<img src="https://www.salonamiante.fr/wp-content/uploads/2018/06/conferences-spa.png" alt="Les conférences du SPA PARIS 2018" class="img-responsive">
<p class="font-white">Le SPA PARIS sera rythmé de conférences et ateliers autour de la réglementation, de la montée en compétences et des évolutions du marché. Des tables rondes de retours d’expériences en présence d’institutionnels, permettront également d’apporter un éclairage sur les dernières actualités.</p>
</div>
<div class="col-md-4">
<h3 class="font-white title-padding-bottom text-center">PROGRAMME DES CONFÉRENCES</h3>              
<h5 class="font-white">MARDI 12 SEPTEMBRE</h5>
<div class="col-md-2">
<p class="font-white">10h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white">« Regards croisé : Allier les expertises pour optimiser la gestion du risque amiante »</p>                            
</div>
<div class="col-md-2">
<p class="font-white">16h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white title-padding-bottom">Grand Quiz de l'Amiante</p>
</div>                               

<h5 class="font-white">MERCREDI 13 SEPTEMBRE</h5>
<div class="col-md-2">
<p class="font-white">10h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white">« Les innovations sur le marché de l'amiante, le PRDA et les autres initiatives »</p>
</div>
<div class="col-md-2">
<p class="font-white">16h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white">« Les perspectives et impacts normatifs et réglementaires de l'amiante avant travaux »</p>
</div>
</div>
<div class="col-md-4">
<h3 class="font-white title-padding-bottom text-center">PROGRAMME DES ATELIERS</h3>                  
<h5 class="font-white">MARDI 12 SEPTEMBRE</h5>
<div class="col-md-2">
<p class="font-white">10h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore inventore autem reprehenderit, culpa commodi molestias. Vero neque ducimus eveniet eum blanditiis obcaecati voluptatum, optio, error dignissimos molestias deserunt inventore quasi!</p>                            
</div>
<div class="col-md-2">
<p class="font-white">16h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white title-padding-bottom">Ideo urbs venerabilis post superbas efferatarum gentium cervices oppressas latasque leges fundamenta libertatis et retinacula sempiterna velut frugi parens et prudens et dives Caesaribus tamquam liberis suis regenda patrimonii iura permisit..</p>
</div>                               

<h5 class="font-white">MERCREDI 13 SEPTEMBRE</h5>
<div class="col-md-2">
<p class="font-white">10h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white">Iam virtutem ex consuetudine vitae sermonisque nostri interpretemur nec eam, ut quidam docti, verborum magnificentia metiamur virosque bonos eos, qui habentur, numeremus, Paulos, Catones, Galos, Scipiones, Philos; his communis vita contenta est; eos autem omittamus, qui omnino nusquam reperiuntur.</p>
</div>
<div class="col-md-2">
<p class="font-white">16h00 :</p>
</div>
<div class="col-md-10">
<p class="font-white">Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.</p>
</div>
</div>
</div>
<div class="spacer-section"></div>
</div>
</section>-->
    <section id="partenaires">
        <div class="container-fluid text-center bg-soft-gray">
            <div class="row">
                <h2 class="title-padding-both text-center">NOS PARTENAIRES PRESSE</h2>
                <div class="sub-line bg-gray"></div>
                <div class="spacer-section"></div>
                <div id="press-partners" class="col-md-12 center-block">
                    <?php echo do_shortcode('[logo-slider]'); ?>
                </div>
            </div>
            <div class="spacer-section"></div>
        </div>
    </section>
    <!-- End bloc visiter-->           
</div>

<?php }

remove_action( 'genesis_before_content_sidebar_wrap', 'cs_event_description' );
add_action( 'genesis_before_content_sidebar_wrap', 'show_my_new_body' );

function show_my_new_surfooter(){ ?>

<div id="new-surfooter" class="container-fluid bg-red">
    <div class="row">
        <div class="spacer-section"></div>
        <div class="col-md-3">
            <h3 class="font-white text-center title-padding-bottom">QUI SOMMES NOUS</h3> 
            <div class="sub-line bg-white"></div>
            <div class="title-padding-bottom"></div>
            <div class="surfooter-info">
                <ul>
                    <li><a href="https://www.salonamiante.fr/go/presentation-spa-paris/">Le Salon</a></li>
                    <li><a href="https://www.salonamiante.fr/conditions-generales-de-vente/">C.G.V.</a></li>
                    <li><a href="https://www.salonamiante.fr/mentions-legales/">Mentions légales</a></li>                    
                    <li><a href="https://www.salonamiante.fr/contact/">Contactez-nous</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="font-white text-center title-padding-bottom">EXPOSER</h3> 
            <div class="sub-line bg-white"></div>
            <div class="title-padding-bottom"></div>
            <div class="surfooter-info">
                <ul>
                    <li><a href="https://www.salonamiante.fr/go/exposer-au-spa-paris/">Exposer au SPA PARIS</a></li>
                    <li><a href="https://www.salonamiante.fr/acces-2/">Comment venir ?</a></li>
                    <li><a href="https://www.salonamiante.fr/exposants-salon/">Liste des exposants</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="font-white text-center title-padding-bottom">ACCÈS RAPIDE</h3> 
            <div class="sub-line bg-white"></div>
            <div class="title-padding-bottom"></div>
            <div class="surfooter-info">
                <ul>
                    <li><a href="https://www.salonamiante.fr/go/visiteurs/">Visiteurs</a></li>
                    <li><a href="https://www.salonamiante.fr/programme/">Programme</a></li>
                    <li><a href="https://www.salonamiante.fr/go/des-espaces-pro/">Espaces pro</a></li>
                    <li><a href="https://www.salonamiante.fr/go/salon-amiante-regions/">Le SPA en Régions</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="font-white text-center title-padding-bottom">SUIVEZ-NOUS</h3> 
            <div class="sub-line bg-white"></div>
            <div class="title-padding-bottom"></div>
            <div class="surfooter-info">
                <a href="https://www.linkedin.com/showcase/salons-spa/" target="_blank";><img src="https://www.salonamiante.fr/wp-content/uploads/2018/04/logo-linkedin.png" alt="Suivez-nous sur LinkedIn Salon de sProfessionnels de l'Amiante" class="img-responsive center-block"></a>
            </div>
        </div>
    </div>
    <div class="spacer-section"></div>
</div>
<?php }

remove_action( 'genesis_before_footer', 'cs_event_description' );
add_action( 'genesis_before_footer', 'show_my_new_surfooter' );

function show_my_new_footer(){ ?>
<div id="new-footer" class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="title-padding-bottom"></div>
            <p> © 2015 Salon Amiante. Tout droits réservés.</p>
            <div class="title-padding-bottom"></div>
        </div> 
    </div>        
</div>

<?php }

remove_action( 'genesis_footer', 'cs_event_description' );
add_action( 'genesis_footer', 'show_my_new_footer' );


genesis();