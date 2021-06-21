<template>
  <panel class="panel-secondary">
    <template slot="header">
      <title-bar /> <i class="fa fa-home"></i> {{ __('Home') }}
    </template>
    <template slot="actions">
      <nav-bar />
    </template>
    <h1>
      Mis Eventos
    </h1>
     <tabla :fields="fields" :form-fields="formFields" :api="api" :title="__('Eventos')"
      :new-record="nuevoRegistro"
      :search-in="['attributes.name']"
    >
      <template v-slot:actions="data">
        <b-button @click="editarEntradas(data.item)" variant="info"><i class="fas fa-ticket-alt"></i> Entradas</b-button>
        <b-button :href="`/ticket/${data.item.id}`" target="_blank" variant="info"><i class="fas fa-eye"></i> Vista previa</b-button>
      </template>
    </tabla>
    <b-modal id="entradas"
      @ok="guardarEntradas"
      title="Entradas disponibles"
      ref="entradas"
    >
      <tabla ref="entradas" :fields="entradasCols" :form-fields="entradasFields" :api="apiEntradas" :title="__('Entradas')"
        :new-record="nuevaEntrada"
        :params="{per_page: -1}"
      >
        <template v-slot:actions="data">
          <b-button @click="limpiar(data.item)" variant="warning"><i class="fas fa-eraser"></i> Limpiar reservas</b-button>
        </template>
      </tabla>
    </b-modal>
 </panel>
</template>

<script>
export default {
  path: "/",
  mixins: [window.ResourceMixin],
  data() {
    return {
      ///
      record: null,
      apiEntradas: null,
      nuevaEntrada: {
        id: null,
        attributes: {
          name: '',
          price: '',
          available: '',
        },
      },
      entradasCols: [
        {key:'attributes.name', label: 'Título'},
        {key:'attributes.price', label: 'Precio'},
        {key:'attributes.available', label: '# dispo'},
        {key:'attributes.reserved', label: '# reserv'},
        {key:'actions', label: ''},
      ],
      entradasFields: [
        {key:'attributes.name', create: true, edit: true, label: 'Título'},
        {key:'attributes.price', create: true, edit: true, label: 'Precio'},
        {key:'attributes.available', create: true, edit: true, label: 'Total disponibles'},
      ],
      ///
      nuevoRegistro: {
        id: null,
        attributes: {
          name: '',
          organizer: '',
          start_at: '',
          end_at: '',
          place: '',
          description: '',
          categoria: '',
        },
      },
      eventos: this.$api.events.row(),
      api: this.$api.user[`${window.userId}/events`],
      fields: [
        {key:'attributes.name', label: 'Nombre del evento'},
        {key:'attributes.start_at', component: 'datetime', label: 'Desde'},
        {key:'attributes.end_at', component: 'datetime', label: 'Hasta'},
        {key:'attributes.categoria', label: 'Categoria'},
        {key:'actions', label: ''},
      ],
      formFields: [
        {key:'attributes.name', create: true, edit: true, label: 'Nombre del evento'},
        {key:'attributes.organizer', create: true, edit: true, label: 'Organizador'},
        {key:'attributes.start_at', component: 'datetime', create: true, edit: true, label: 'Desde'},
        {key:'attributes.end_at', component: 'datetime', create: true, edit: true, label: 'Hasta'},
        {key:'attributes.place', create: true, edit: true, label: 'Lugar'},
        {key:'attributes.description', create: true, edit: true, label: 'Descripción', component: 'b-textarea'},
        {key:'attributes.categoria', create: true, edit: true, label: 'Categoria'},
        {key:'attributes.image', create: true, edit: true, label: 'Imagen principal', component: 'UploadImage'},
      ],
    };
  },
  methods: {
    limpiar(record) {
      this.record = record;
      this.$api.entradas.call(record.id, 'cleanReservations', {}).then(() => {
        this.$refs.entradas.loadData();
      });
    },
    editarEntradas(record) {
      this.record = record;
      this.apiEntradas = this.$api.events[`${record.id}/entradas`];
      this.$refs.entradas.show();
    },
    guardarEntradas() {
      this.$refs.entradas.hide();
    },
  },
};
</script>
