<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Tableau de bord</li>
                    <a href="/" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text"> Tableau de bord</span>
                        </a>
                    <li>
                      
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Authentification</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('alladminsup') }}">Liste des administrateurs</a></li>
                            <li><a href="{{ route('allemployer') }}">Liste des employeurs</a></li>
                            <li><a href="{{ route('alldebtor') }}">Liste des redevables</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-label">Informations Générales</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Documents utils</span>
                        </a>
                        <ul aria-expanded="false">
                              <li><a href="{{ route('allrate') }}">Liste des taux</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Taux de remboursement</span>
                        </a>
                        <ul aria-expanded="false">
                                <li><a href="{{ route('allrate') }}">Liste des taux</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Grille de remboursement</span>
                        </a>
                        <ul aria-expanded="false">
                              <li><a href="{{ route('allrepaymentamount') }}">Voir la grille</a></li>
                        </ul>
                    </li>
                 
                   
                </ul>
            </div>
        </div>