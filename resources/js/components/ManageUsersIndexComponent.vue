<template>
    <div class="container">
        <div class="row">
            <flash message=""></flash>
            <div class="" v-for="user in usersInfo"  v-bind:key="user.id">
                <a v-bind:href="/user/ + user.id">{{user.name}}</a>
                <a :href="'/manage/users/' + user.id + '/edit'"><button class="btn btn-info">Edit</button></a>
                <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data() {
        return {
          errors: {},
          usersInfo: {},
        }
      },
      methods: {
        getUsers(
          page = 1
        ){
          axios.get('/api/users')
                .then((response)=>{
                this.usersInfo = response.data.data
                })
                .catch(error => {
                  console.log(error)
                })
          },
          deleteUser(id){
              console.log(id)
              confirm('Are you sure you want to delete this user?')
              axios.delete('/api/manage/user/' + id + '/delete').then(response=>{
                  this.getUsers();
                  flash('User Successfully Deleted.', 'success');
              }).catch(error => {
                if (error.response.status === 422) {
                    // flash message failure
                    flash('Could not delete user.', 'failure')
                    this.errors = error.response.data.errors || {};
                }
        });
          }
      },
      created() {
        this.getUsers()
      }
    }
</script>