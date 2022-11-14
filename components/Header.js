class Header extends HTMLElement

{

	constructor(){

		super()

	}

	connectedCallback(){

		this.innerHTML = `

          <header id="header">

             <div id="container-icon-menu">

                  <img src="assets/img/hamburge.svg">

             </div>



              <div id="container-icon-user">

                  <img  src="assets/img/user.svg">

                  <div id="close">

                        <a href="index.php?m=usuario&accion=actualizar">Usuario</a>

                        <a id="close-session">Cerrar</a>

                  </div>

              </div>



          </header>

		`;

	}

}

window.customElements.define('header-header',Header);



