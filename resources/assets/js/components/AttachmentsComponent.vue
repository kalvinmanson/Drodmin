<template>
  <div class="card-columns">
      <div class="card" v-for="attachment in attachmentsList">
        <a v-on:click="use(attachment)">
          <img :src="attachment.thumbnail" class="img-fluid">
        </a>
        <div class="card-footer">
          {{ attachment.name }}
        </div>
      </div>
  </div>
</template>

<script>

export default {
  props: ['attachments'],
  data() {
    return {
      attachmentsList: []
    };
  },
  mounted() {
    this.attachmentsList = this.attachments;
  },
  methods: {
    use(attachment) {
      window.opener.CKEDITOR.tools.callFunction( 1, attachment.path );
      window.close();
    }
  }
};
</script>

<style scoped>
  .card-columns {
    column-count: 5;
  }
</style>
