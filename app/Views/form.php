<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body class="container">
    <form action="<?= base_url('/formReceive'); ?>" method="post" id="form">
        <div class="my-3">
            <button class="btn btn-outline-primary btn-sm button">Enviar</button>
            <button type="button" class="btn btn-outline-success btn-sm btn-agregar">+</button>
        </div>
        <div id="lista-productos g-3 mb-3"></div>
        <template id="producto-template">
            <div class="producto row g-3 mb-2">
                <div class="col-3">
                    <select class="selectProducto form-select" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="1">Producto uno</option>
                        <option value="2">Producto dos</option>
                        <option value="3">Producto tres</option>
                    </select>
                </div>
                <div class="col-2">
                    <input type="number" value="0" min="1" class="inputProducto form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-remover col-auto">-</button>
            </div>
        </template>
    </form>
    <script>
        let contador = 0;

        function crearTemplate() {
            contador++;
            if ('content' in document.createElement('template')) {
                let listaProductos = document.querySelector('#lista-productos');
                let template = document.querySelector('#producto-template');
                let div = document.importNode(template.content, true);
                let selectProducto = div.querySelector(".selectProducto");
                let inputProducto = div.querySelector(".inputProducto");
                selectProducto.setAttribute("name", `productos[${parseInt(contador)}][id_producto]`)
                inputProducto.setAttribute("name", `productos[${parseInt(contador)}][cantidad]`)
                addClick(div.querySelector('.btn-remover'));
                form.appendChild(div);
            } else {
                // Buscar otra manera de añadir filas a la tabla porque el
                // elemento template no está soportado.
            }
        }

        function addClick(element) {
            element.addEventListener("click", function(event) {
                event.target.closest(".producto").remove();
            });
        }

        document.querySelector('.btn-agregar').addEventListener('click', crearTemplate);
        crearTemplate()
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>