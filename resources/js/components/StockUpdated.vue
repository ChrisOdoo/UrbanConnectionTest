<template>
    <div>
        <h1>Producto con ID {{ productId }}</h1>
        <h2>Stock actual: {{ stock }}</h2>
    </div>
</template>

<script>
import { ref, watchEffect, onMounted } from "vue";

export default {
    name: "StockUpdated",
    props: {
        productId: Number,
        newStock: Number
    },
    setup(props) {
        const stock = ref(props.newStock);

        onMounted(() => {
            console.log("Escuchando eventos en stock-channel...");
            window.Echo.channel("stock-channel").listen(".StockUpdated", (event) => {
                console.log("Evento recibido:", event);
                if (event.productId === props.productId) {
                    console.log("Actualizando stock: ", event.newStock);
                    stock.value = event.newStock;
                }
            });
        });

        return { stock };
    }
};
</script>



