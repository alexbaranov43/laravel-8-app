<template>
    <div>
        <h1>
           Edit {{this.$attrs.user.name}}
        </h1>
        <flash message=""></flash>
        <form @submit.prevent="submit" method="PATCH">
            <input type="hidden" class="form-control" id="user_id" name="user_id" v-model="fields.user_id">
            <label for="name">Name</label>
            <br>
            <input type="text" v-model="fields.name">
            <br><br>
            <label for="Select">User Role</label>
            <br>
            <select v-model="fields.role_id">
                <option value="1">Member</option>
                <option value="2">Admin</option>
            </select>
            <br><br>
            <button type="submit" class="btn btn-primary">Store</button>
        </form>
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
        this.fields.user_id = this.$attrs.user.id
        //set the user id to the passed attribute
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.patch('/api/manage/user/' + this.fields.user_id, this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
          // Flash message success
          flash('User Successfully Updateed.', 'success');
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            // flash message failure
            flash('Unsuccessful Update', 'failure')
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
  }
</script>