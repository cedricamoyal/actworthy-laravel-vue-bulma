<template>
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input" type="text" placeholder="Email" v-model="guest.guestEmail">
                    </div>
                    <div class="control is-expanded">
                        <input class="input" type="text" placeholder="Password" v-model="guest.guestPassword">
                    </div>
                    <div class="control">
                        <a class="button is-primary" @click="createGuest()">
                            Add guest
                        </a>
                    </div>
                </div>

                <div class="tabs is-centered">
                    <ul>
                        <li>
                            <h3 class="title">
                                    Our guests
                            </h3>
                        </li>
                    </ul>
                </div>
                <div class="card" v-for="guest in list">
                    <div class="card-content">
                        <div class="content">
                            <p>
                                {{ guest.guestEmail }} -- {{ guest.guestPassword }}
                            </p>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a class="card-footer-item" v-on:click.prevent="deleteGuest(guest.id)">Delete</a>
                    </footer>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        directives: {
            'autofocus': {
                inserted(el) {
                    el.focus();
                }
            }
        },
        data() {
            return {
                list: [],
                guest: {
                    id: '',
                    guestEmail: '',
                    guestPassword: ''
                }
            }
        },
        created() {
            this.fetchGuestList();
        },
        methods: {
            fetchGuestList() {
                axios.get('current_guests').then(result => {
                    this.list = result.data
                });
            },
            createGuest() {
                axios.post('create_guest', this.guest).then(result => {
                    this.guest.guestEmail = '';
                    this.guest.guestPassword = '';
                    this.fetchGuestList();
                }).catch(err => {
                    console.log(err);
                });
            },
            deleteGuest(id) {
                axios.post('delete_guest/' + id).then(result => {
                    this.fetchGuestList();
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>