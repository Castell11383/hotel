import { Dropdown } from "bootstrap";
import Chart from "chart.js/auto";

const canvas = document.getElementById('chartVentas'); // Cambié 'habitaciones' a 'chartVentas'
const ctx = canvas.getContext('2d');
const btnActualizar = document.getElementById('actualizar');

const data = {
    labels: [],
    datasets: [{
        label: 'Cantidad de Reservas', // Cambié el label a 'Cantidad de Reservas'
        data: [],
        borderWidth: 5,
        backgroundColor: []
    }]
};

const chartProductos = new Chart(ctx, {
    type: 'bar',
    data: data,
});

const getEstadisticas = async () => {
    const url = `/hotel/API/detalle/index`; // Asegúrate que el endpoint esté correcto
    const config = { method: "GET" };
    
    try {
        const response = await fetch(url, config);
        
        if (!response.ok) {
            throw new Error("Error en la solicitud a la API");
        }

        const data = await response.json();
        console.log(data);  // Para verificar los datos recibidos

        if (data) {
            if (chartProductos.data.datasets[0]) {
                // Limpiar datos anteriores
                chartProductos.data.labels = [];
                chartProductos.data.datasets[0].data = [];
                chartProductos.data.datasets[0].backgroundColor = [];

                // Usamos 'tipo_habitacion' y 'cantidad_reservas' para actualizar los datos
                data.forEach(r => {
                    chartProductos.data.labels.push(r.tipo_habitacion);  // Usamos 'tipo_habitacion' como label
                    chartProductos.data.datasets[0].data.push(r.cantidad_reservas);  // Usamos 'cantidad_reservas' como dato
                    chartProductos.data.datasets[0].backgroundColor.push(generateRandomColor());  // Colores aleatorios
                });
            }
        }

        chartProductos.update();  // Actualizar la gráfica con los nuevos datos
    } catch (error) {
        console.error("Error al obtener estadísticas:", error);
    }
};

const generateRandomColor = () => {
    const r = Math.floor(Math.random() * 256); // Valor de rojo entre 0 y 255
    const g = Math.floor(Math.random() * 256); // Valor de verde entre 0 y 255
    const b = Math.floor(Math.random() * 256); // Valor de azul entre 0 y 255

    const rgbColor = `rgb(${r}, ${g}, ${b})`;
    return rgbColor;
}

// Escuchar el botón de actualización para cargar los datos y actualizar la gráfica
btnActualizar.addEventListener('click', getEstadisticas);
