<template>
  <div class="form-group">
    <div class="d-inline-block">
      <upload v-model="local" @change="ready" url="/api/uploadimage">
        <button type="button" class="btn btn-primary">
          <i class="fas fa-file-upload"></i>
          {{ __("Subir imagen") }}
        </button>
      </upload>
    </div>
    <img v-if="local && local.url" :src="local.url" class="preview-img">
  </div>
</template>

<script>
export default {
  props: {
    value: null,
  },
  data() {
    return {
      local: this.value,
    };
  },
  methods: {
    ready(file) {
      this.$emit('input', file);
      this.$emit('change', file);
    },
  },
};
</script>

<style>
.preview-img {
  height: 5em;
  border: 1px solid black;
}
</style>