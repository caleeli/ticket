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
    ></tabla>
 </panel>
</template>

<script>
export default {
  path: "/",
  mixins: [window.ResourceMixin],
  data() {
    return {
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
        {key:'id', label: 'id'},
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
        {key:'attributes.description', create: true, edit: true, label: 'Descripción'},
        {key:'attributes.categoria', create: true, edit: true, label: 'Categoria'},
      ],
    };
  },
};
</script>
