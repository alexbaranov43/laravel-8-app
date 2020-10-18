<template>
  <div>
    <!-- Flash Message Upon Success -->
    <flash message=""></flash>
    <div>
      <!-- image Form for Submission -->
      <form @submit.prevent="submit" method="POST">
          <div class="form-group">
              <label for="image">Store Image</label>
              <!-- Hidden User ID Input -->
              <input type="hidden" class="form-control" id="user_id" name="user_id" rows="5" v-model="fields.user_id">
              <!-- image Text Input -->
              <textarea class="form-control" id="image" name="image" rows="5" v-model="fields.image" required></textarea>
              <div v-if="errors && errors.image" class="text-danger">{{ errors.image[0] }}</div>
          </div>
          <button type="submit" class="btn btn-primary">Store</button>
      </form>
      <br>
    </div>
    <br><br>
  </div>
</template>

<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      loaded: true,
      success: false
    }
  },
  methods: {
    submit() {
      if (this.loaded) {
        //set the user id to the passed attribute
        this.fields.user_id = this.$attrs.user_id
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post('/api/store/image', this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
          // Flash message success
          flash('Image Successfully Added.', 'success');
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            // flash message failure
            flash('Incorrect User Id or Imagee', 'failure')
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
  }
</script>