<template>
    <div v-if="cliente.id">
        <CardComponent size="col-5">
            <h1>Cliente: {{ cliente.nombre + ' ' + cliente.apellidos }}</h1>
            <h6>Meter Informacion del empleaado que le ha dado de alta</h6>
        </CardComponent>
    </div>

    <div v-if="!cliente.id">
        <CardComponent size="col-3">
            <h1 class="text-center">Creación del Cliente</h1>
        </CardComponent>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="btn-group my-3" role="group">
                <button type="button" class="btn btn-info" @click="cambiarPestania('detalle')">Información</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('facturacion')">Datos
                    Facturación</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('fechaSenialada')">Fechas
                    Señaladas</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('cuenta_cte')">Cuenta Cte</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('g_Apartado')">G Apartado</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('notas')">Notas</button>
                <button  v-if="cliente.reparaciones && cliente.reparaciones.length > 0" type="button" class="btn btn-warning"
                    @click="cambiarPestania('reparaciones')">
                    Reparaciones Pendientes
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ cliente.reparaciones.length }}
                    </span>
                </button>
            </div>

        </div>
        <div class="col">
            <BotonesCrud @crear="crear(cliente)" @eliminar="eliminar(cliente.id)" @modificar="modificar(cliente)"
                :is-cliente="!!cliente.id" text='Crear nuevo cliente' />
        </div>
    </div>

    <div id="vistas">
        <div class="informacion" v-if="selector == 'detalle'">
            <detalleCliente :cliente="cliente" />
        </div>

        <div class="facturacion" v-if="selector == 'facturacion'">
            <datosFacturacion />
        </div>

        <div class="fechaSenialada" v-if="selector == 'fechaSenialada'">
            <fechasSenialadas />
        </div>

        <div class="cuenta_cte" v-if="selector == 'cuenta_cte'">
            <cuentaCorriente />
        </div>

        <div class="g_Apartado" v-if="selector == 'g_Apartado'">
            <apartados />
        </div>

        <div class="notas" v-if="selector == 'notas'">
            <notas />
        </div>

        <div class="reparacion" v-if="selector == 'reparaciones'">
            <reparaciones :reparacion-externa="cliente.reparaciones" :has-params="true" />
        </div>

    </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import { useCliente } from "@/VUE/composables/useCliente";
import detalleCliente from "@/VUE/components/clientes/detalleCliente.vue";
import datosFacturacion from "@/VUE/components/clientes/datosFacturacion.vue";
import cuentaCorriente from "@/VUE/components/clientes/cuentaCorrienteCliente.vue";
import fechasSenialadas from "@/VUE/components/clientes/fechasSenialadasCliente.vue";
import apartados from "@/VUE/components/clientes/apartadosCliente.vue";
import notas from "@/VUE/components/clientes/notasCliente.vue";
import reparaciones from "@/VUE/components/reparaciones/listadoReparacion.vue";

import CardComponent from "@/VUE/components/helpers/CardComponent.vue";
import BotonesCrud from "@/VUE/components/helpers/BotonesCrudComponent.vue";

//Estrcuctura Composable
const { selector, cliente, cambiarPestania, detalle, modificar, eliminar, crear, nuevoCliente } = useCliente();

const route = useRoute();

onMounted(async () => {
    selector.value = 'detalle';
    try {
        if (route.params.id) {
            detalle(parseInt(route.params.id as string));
        } else {
            nuevoCliente()
        }
    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>