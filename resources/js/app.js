import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import 'jquery-mask-plugin';
import $ from "jquery";

window.Alpine = Alpine;
window.Swal = Swal;
Alpine.start();

window.jQuery = window.$ = $;

$('#cpf').mask('000.000.000-00');
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
    cpf = cpf.replace(/\D/g, '');
    valor = valor.replace('.', '');
    console.log(valor);
    qntParcelas = qntParcelas.replace(/\D/g, '');
    axios.post(routeConsulta, {
        cpf: cpf,
        valor: valor,
        qntParcelas: qntParcelas
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {
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
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Não encontramos nenhuma oferta elegível para o CPF informado!'
            });
            document.getElementById('loader').classList.add('hidden');
        });
});