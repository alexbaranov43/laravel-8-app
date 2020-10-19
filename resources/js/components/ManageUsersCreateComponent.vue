<template>
  <div>
    <!-- Flash Message Upon Success -->
    <flash message=""></flash>
    <div>
      <!-- image Form for Submission -->
      <form @submit.prevent="submit" method="POST">
          <div class="form-group">
              <label for="image">Create New User</label>
              <!-- Name Text Input -->
              <label for="Name">User Name</label>
              <br>
              <input type="text" class="form" id="name" name="name" v-model="fields.name" required />
              <div v-if="errors && errors.image" class="text-danger">{{ errors.image[0] }}</div>
              <br><br>
              <!-- Email Text Input -->
              <label for="Email">User Email</label>
              <br>
              <input type="text" class="form" id="email" name="email" v-model="fields.email" required />
              <br><br>
              <!-- Password Text Input -->
              <label for="Password">User Password</label>
              <br>
              <input type="password" class="form" id="password" name="password" v-model="fields.password" required />
              <br><br>
              <!-- Role Select -->
              <label for="Select">User Role</label>
              <br>
              <select v-model="fields.role_id">
                  <option value="1">Member</option>
                  <option value="2">Admin</option>
              </select>
              
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
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post('/api/manage/user/store', this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
          // Flash message success
          flash('User Successfully Added.', 'success');
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            // flash message failure
            flash('Incorrect User Id or Image', 'failure')
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
  }
</script>