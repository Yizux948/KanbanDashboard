const fechaActual = new Date();
const anioActual = fechaActual.getFullYear();
copy = document.querySelector("#copy");
copy.innerHTML = `<p>Copyright © ${anioActual} - <b>Jesús Peña, Ismael Bracamonte y Yelmer Meriño</p>`;


// EJECUTAR UN MODAL PARA BANDEJA DE ENTRADA
const showFiles = document.querySelector("#showFiles");
showFiles.addEventListener("dblclick", ()=>{

const form = `
<div class="row">
  <div class="col col-12">
    <!-- INICIO -->
    <div class='modal fade' id='exampleModal1' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h1 class='modal-title fs-5 w-75 fw-bold' id='exampleModalLabel'>Bandeja De Entrada</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            <div class="row">
            <form action="src/php/save.php" method="POST">
              <!-- TITULO DE LA TAREA -->
              <div class="col col-12">
                <input name="tit" class="w-100 border-0 border-bottom mb-4" placeholder="Titulo De La Tarea" required>
              </div>
              <!-- DESCRIPCION DE LA TAREA -->
              <div class="col col-12">
                <textarea rows="2" name="dsc" class="w-100 border-0 border-bottom mb-3" placeholder="Descripcion De La Tarea" required></textarea>
              </div>
              <!-- DURACION DE LA TAREA DIAS-->
                <div class="col col-12 mb-5">
                  <input type="number" name="tiem" class="w-50 border-0 border-bottom me-5" placeholder="Tiempo Estimado" max="99" required>
                  <select name="mod" class="w-25 border-0 border-bottom text-muted">
                    <option disabled selected>Modalidad</option>
                    <option value="horas" class="text-body">Horas</option>
                    <option value="días" class="text-body">Días</option>
                  </select>
                </div>
              <!-- PUBLICADO POR -->
                <div class="col col-12">
                  <input name="persona" class="w-100 border-0 border-bottom mb-4" placeholder="Publicado Por" required>
                </div>                
                <div class="col col-12">
                  <button type='submit' class='btn btn-success mt-4 w-100 btn-sm'>Nueva Tarea</button>
                </div>
            </form>

            </div>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
          </div>
        </div>
      </div>
    </div>  
    <!-- FIN -->
  </div>
</div>
`;

formu = document.querySelector("#formu");
formu.innerHTML = form;
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal1'), {
        keyboard: true
      })
      myModal.show();




// Obtenemos el textarea
const textarea = document.querySelector("textarea");

// Obtenemos el número actual de filas del textarea
const currentRows = textarea.rows;

// Añadimos un evento de escucha al textarea para cuando se escriba en él
textarea.addEventListener("input", function() {
  // Obtenemos el número de líneas necesarias para mostrar todo el texto
  const neededRows = textarea.scrollHeight / textarea.clientHeight;

  // Si el número de filas necesarias es mayor que el número actual de filas
  if (neededRows >= currentRows) {
    // Añadimos tantas filas como sea necesario
    textarea.rows += (neededRows - currentRows);
  }
});      
});










// EJECUTAR UN MODAL PARA TAREAS PRIORITARIAS
const optionsPri = document.querySelectorAll(".optionsPri");
for(let i = 0; i<optionsPri.length; i++){
optionsPri[i].addEventListener("click", ()=>{

let id = optionsPri[i].getAttribute("count");

const form = `
<div class="row">
  <div class="col col-12">
    <div class='modal fade' id='exampleModal2' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h1 class='modal-title fs-5 w-75 fw-bold' id='exampleModalLabel'>Opciones De Tarea</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            <div class="row d-flex justify-content-center">
            <div class="col col-12">

              <form action="src/php/take.php" method="GET">
              <button type="submit" class='btn btn-secondary mt-4 w-100 btn-sm'>Tomar Tarea</button>
              <input type="text" name="persona" class="w-100 border-0 border-bottom mt-2" placeholder="En Progreso De: " required>
              <input type="hidden" name="id" value="${id}" required>
              </form>


              <form action="src/php/layof.php" method="POST">
              <button type="submit" class='btn btn-secondary mt-4 w-100 btn-sm'>Suspender Tarea</button>
              <input type="text" name="moti" class="w-100 border-0 border-bottom" placeholder="Motivo Por El Cual Suspender La Tarea" max="99" required>
              <input type="text" name="persona" class="w-100 border-0 border-bottom mt-2" placeholder="Suspendido Por: " required>              
              <input type="hidden" name="id" value="${id}" required>
              </form>

              <a href="src/php/deletePri.php?id=${id}" class='btn btn-secondary mt-3 w-100 btn-sm'>Eliminar Tarea</a>
            </div>
            </div>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
`;

optionMenu = document.querySelector("#optionMenu");
optionMenu.innerHTML = form;
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'), {
        keyboard: true
      })
      myModal.show();
    
});

}




// EJECUTAR UN MODAL PARA TAREAS DE ESPERA
const optionsEspe = document.querySelectorAll(".optionsEspe");
for(let i = 0; i<optionsEspe.length; i++){
  optionsEspe[i].addEventListener("click", ()=>{

let id = optionsEspe[i].getAttribute("count");

const form = `
<div class="row">
  <div class="col col-12">
    <div class='modal fade' id='exampleModal3' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h1 class='modal-title fs-5 w-75 fw-bold' id='exampleModalLabel'>Opciones De Tarea</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            <div class="row d-flex justify-content-center">
            <div class="col col-12">
              <a href="src/php/reactivate.php?id=${id}" class='btn btn-secondary mt-4 w-100 btn-sm'>Activar Tarea</a>

              <a href="src/php/deletePri.php?id=${id}" class='btn btn-secondary mt-3 w-100 btn-sm'>Eliminar Tarea</a>
            </div>
            </div>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
`;

optionMenu = document.querySelector("#optionMenuWait");
optionMenu.innerHTML = form;
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal3'), {
        keyboard: true
      })
      myModal.show();
    
});

}









// EJECUTAR UN MODAL PARA TAREAS EN PROGRESO
const optionsProg = document.querySelectorAll(".optionsProg");
for(let i = 0; i<optionsProg.length; i++){
  optionsProg[i].addEventListener("click", ()=>{

let id = optionsProg[i].getAttribute("count");
let persona = optionsProg[i].getAttribute("pers");

const form = `
<div class="row">
  <div class="col col-12">
    <div class='modal fade' id='exampleModal3' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h1 class='modal-title fs-5 w-75 fw-bold' id='exampleModalLabel'>Opciones De Tarea</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            <div class="row d-flex justify-content-center">
            <div class="col col-12">
              <a href="src/php/completed.php?id=${id}&persona=${persona}" class='btn btn-secondary mt-4 w-100 btn-sm'>Tarea Completada</a>

              <form action="src/php/layof.php" method="POST">
              <button type="submit" class='btn btn-secondary mt-4 w-100 btn-sm'>Suspender Tarea</button>
              <input type="text" name="moti" class="w-100 border-0 border-bottom" placeholder="Motivo Por El Cual Suspender La Tarea" max="99" required>
              <input type="hidden" name="id" value="${id}" required>
              </form>
              <a href="src/php/deletePri.php?id=${id}" class='btn btn-secondary mt-3 w-100 btn-sm'>Eliminar Tarea</a>
            </div>
            </div>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
`;

optionMenu = document.querySelector("#optionMenuWait");
optionMenu.innerHTML = form;
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal3'), {
        keyboard: true
      })
      myModal.show();

});

}