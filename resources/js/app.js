import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import 'jquery-mask-plugin';
import $ from "jquery";

window.Alpine = Alpine;
window.Swal = Swal;
Alpine.start();

window.jQuery = window.$ = $;

/** apply mask */
$('#cpf').mask('000.000.000-00');
/** money mask */
$('#valor').mask('#.##0', { reverse: true });

document.getElementById('sendData').addEventListener('click', function () {
    let cpf = document.getElementById('cpf').value;
    let valor = document.getElementById('valor').value;
    let qntParcelas = document.getElementById('qntParc').value;
    const routeConsulta = document.getElementById('sendData').getAttribute('data-routeConsulta');
    const routeRenderBoxes = document.getElementById('sendData').getAttribute('data-routeBoxes');

    if (cpf === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Por favor, preencha o campo CPF!'
        });
        return;
    }
    if (valor === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Por favor, preencha o campo valor!'
        });
        return;
    }
    document.getElementById('resultado').classList.remove('hidden');
    document.getElementById('loader').classList.remove('hidden');

    /** remove mask from fields */
    cpf = cpf.replace(/\D/g, '');
    valor = valor.replace('.', '');
    console.log(valor);
    qntParcelas = qntParcelas.replace(/\D/g, '');

    /* $.ajax({
         url: routeConsulta,
         method: 'POST',
         contentType: 'application/json',
         data: JSON.stringify({
             cpf: cpf,
             valor: valor,
             qntParcelas: qntParcelas
         }),
         success: function(response) {
             console.log('API Response:', response);
 
             if (response.status) {
                 const boxes = $('#boxes');
                 $.ajax({
                     url: routeRenderBoxes,
                     method: 'POST',
                     contentType: 'application/json',
                     data: JSON.stringify({ items: response.data }),
                     success: function(response) {
                         $('#loader').addClass('hidden');
                         boxes.html(response.html);
                     },
                     error: function(error) {
                         Swal.fire({
                             icon: 'error',
                             title: 'Oops...',
                             text: error.responseText
                         });
                         $('#loader').addClass('hidden');
                     }
                 });
             } else {
                 Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: response.message
                 });
                 $('#loader').addClass('hidden');
             }
         },
         error: function(error) {
             console.log(error);
             Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 text: 'Ocorreu um erro ao realizar a consulta!'
             });
             $('#loader').addClass('hidden');
         }
     });*/
    /*axios.post(routeConsulta, {
        'cpf': cpf,
        'valor': valor,
        'qntParcelas': qntParcelas
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {
        if (response.data.status) {
            console.log(response.data.data);
            const boxes = document.getElementById('boxes');
            axios.post(routeRenderBoxes, { items: response.data.data }, {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(function (response) {
                    document.getElementById('loader').classList.add('hidden');
                    boxes.innerHTML = response.data.html;
                })
                .catch(function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error
                    });
                    document.getElementById('loader').classList.add('hidden');
                });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response.data.message
            });
            document.getElementById('loader').classList.add('hidden');
        }
    })
        .catch(function (error) {
            console.log(error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error
            });
            document.getElementById('loader').classList.add('hidden');
        });*/

    axios.post(routeConsulta, {
        cpf: cpf,
        valor: valor,
        qntParcelas: qntParcelas
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {
        console.log('API Response:', response.data); // Verificar a resposta da API

        if (response.data.status) {
            const boxes = document.getElementById('boxes');
            axios.post(routeRenderBoxes, { items: response.data.data })
                .then(function (response) {
                    document.getElementById('loader').classList.add('hidden');
                    boxes.innerHTML = response.data.html;
                    boxes.scrollTop = boxes.scrollIntoView({ behavior: 'smooth', block: 'start' });
                })
                .catch(function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error
                    });
                    document.getElementById('loader').classList.add('hidden');
                });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response.data.message
            });
            document.getElementById('loader').classList.add('hidden');
        }
    })
        .catch(function (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Não encontramos nenhuma oferta elegível para o CPF informado!'
            });
            document.getElementById('loader').classList.add('hidden');
        });
});