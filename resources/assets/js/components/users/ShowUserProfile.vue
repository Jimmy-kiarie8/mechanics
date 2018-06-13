<template>
	<div>
		<!-- profile -->
		<v-dialog v-model="openProRequest" fullscreen hide-overlay transition="dialog-bottom-transition">
			<v-card id="shipment_det">
				<v-card-title>
					<v-toolbar dark color="primary">
						<v-btn icon dark @click.native="close">
							<v-icon color="black">close</v-icon>
						</v-btn>
						<v-spacer></v-spacer>
					</v-toolbar>
					<span class="headline"></span>
				</v-card-title>
				<v-card-text>

					<v-card>
						<v-layout row>
							<v-flex sm3 offset-sm1>
								<img src="" alt="profile">
								<star-rating  :read-only="true" :increment="0.01" v-model="rating" :star-size="20"></star-rating>
								<p>{{docsPass.name}}</p>            
								<p>{{docsPass.email}}</p>            
								<p>{{docsPass.ratings}}</p>            
							</v-flex>

							<v-flex sm8>
								<v-card style="max-height: 200px;overflow-y: scroll; border-left: 1px solid #333; background: #f9f9f9;">
									<v-layout row>
										<v-flex xs12 sm10 offset-sm1>
											<v-card>
												<v-layout v-for="comment in AllComments" :key="comment.id">
													<v-flex sm2>
														<div v-for="user in users" v-if="user.id === comment.user_id">commented By:{{ user.name }}</div>
													</v-flex>
													<v-flex sm3>
														On: {{ comment.created_at }}
													</v-flex>
													<v-flex sm3>
														{{ comment.comment }}
													</v-flex>
													<v-flex sm4>
														<star-rating  :read-only="true" :increment="0.01" v-model="comment.rating" :star-size="20"></star-rating>
													</v-flex>
												</v-layout>
											</v-card>
										</v-flex>
									</v-layout>
								</v-card>
							</v-flex>
						</v-layout>
					</v-card>

					<v-divider></v-divider>
					<v-divider></v-divider>
					<v-divider></v-divider>


					<v-container grid-list-md text-xs-center>
						<v-card-title>
							<h3 class="text-center">Documents</h3>
							<v-spacer></v-spacer>
							<v-text-field
							v-model="search"
							append-icon="search"
							label="Search"
							single-line
							hide-details
							></v-text-field>
						</v-card-title>
						<v-data-table
						:headers="proheaders"
						:items="Alldocs"
						:search="search"
						counter
						class="elevation-1"
						>
						<template slot="items" slot-scope="props">
							<td>
								{{ props.item.name }}
							</td>
							<td class="text-xs-right">{{ props.item.description }}</td>
							<td class="text-xs-right">{{ props.item.created_at }}</td>
							<td class="justify-center layout px-0">
								<v-btn icon class="mx-0" @click="download(props.item)">
									<v-icon color="pink darken-2">cloud_upload</v-icon>
								</v-btn>

							</td> 
						</template>
						<v-alert slot="no-results" :value="true" color="error" icon="warning">
							Your search for "{{ search }}" found no results.
						</v-alert>
						<template slot="pageText" slot-scope="{ pageStart, pageStop }">
							From {{ pageStart }} to {{ pageStop }}
						</template>
					</v-data-table>

					<v-divider></v-divider>
					<v-divider></v-divider>
					<v-divider></v-divider>


					<!-- Jobs -->

					<v-card-title>
						<h3 class="text-center">Previous Jobs</h3>
					</v-card-title>
					<v-data-table
					:headers="jobsheaders"
					:items="users"
					counter
					class="elevation-1"
					>
					<template slot="items" slot-scope="props">
						<td>
							{{ props.item.name }}
						</td>
						<td class="text-xs-right">{{ props.item.email }}</td>
						<td class="text-xs-right">{{ props.item.created_at }}</td>
						<td class="justify-center layout px-0">
							<v-btn icon class="mx-0" @click="download(props.item)">
								<v-icon color="teal darken-2">cloud_upload</v-icon>
							</v-btn>

						</td> 
					</template>
					<template slot="pageText" slot-scope="{ pageStart, pageStop }">
						From {{ pageStart }} to {{ pageStop }}
					</template>
				</v-data-table>
				<!-- Jobs -->

			</v-container>
		</v-card-text>
	</v-card>

</v-dialog>
<!-- profile -->

</div>
</template>

<script>
export default{
	props: ['openProRequest', 'users', 'docsPass'],
	data() {
		return {
			search: '',
			rating: 4,
			seeDocuments: {},
			AllComments: [],
			Alldocs: [],

			jobsheaders: [
			{ text: 'Client Name', align: 'left', value: 'name'},
			{ text: 'Client Email', value: 'email' },
			{ text: 'Done on', value: 'created_at' },
			{ text: 'Actions', value: 'name', sortable: false }

			],
			proheaders: [
			{ text: 'Name', align: 'left', value: 'name'},
			{ text: 'description', value: 'description' },
			{ text: 'Uploaded on', value: 'created_at' },
			{ text: 'Actions', value: 'name', sortable: false }
			],
			headers: [
			{ text: 'Name', align: 'left', value: 'name'},
			{ text: 'email', value: 'email' },
			{ text: 'Id Number', value: 'id_no' },
			{ text: 'Phone Number', value: 'phone' },
			{ text: 'Rating', value: 'rating' },
				// { text: 'Location', value: 'location' },
				// { text: 'Current Status', value: 'current_status' },
				{ text: 'Status', value: 'status' },
				{ text: 'Actions', value: 'name', sortable: false }
				],
			}

		},
		methods: {
		  // Ratings && Comments
		  commdialog() {
		    // this.commdialog2 = true
		    axios.post(`/comments/${this.feedback.id}`, this.feedback)
		    .then((response) => {

		    	this.message = 'Commented'
		    	this.color = 'indigo'
		    	this.snackbar = true
		    })
		    .catch((error) => {
		    	this.errors = error.response.data.errors
		    	this.message = 'something went wrong'
		    	this.color = 'red'
		    	this.snackbar = true
		    })
		},
		

		 download(item) {
		  this.docNo = Object.assign({}, item)
		  this.editedIndex = this.Alldocs.indexOf(item)
		  /*axios.get(`/${this.seeDocuments.id}`)
		  .then((response) => {
		   console.log(reaponse);
		    this.message = 'Successifully Added';
		    this.snackbar = true;
		    this.color = 'indigo';
		  })  
		  .catch((error) => {
		    this.errors = error.response.data.errors
		    this.message = 'failed ';
		    this.snackbar = true;
		    this.color = 'red';
		  })*/
		  axios({
		    url: 'http://mechanics.dev/storage/attachments/LmztVebBIu9akwN97ZHUtDzQUgsPFB1odUZGCzkA.pdf',
		    method: 'GET',
		    responseType: 'blob', // important
		  }).then((response) => {
		    this.message = 'Successifully Added';
		    this.snackbar = true;
		    this.color = 'indigo';
		    const url = window.URL.createObjectURL(new Blob([response.data]));
		    const link = document.createElement('a');
		    link.href = url;
		    link.setAttribute('download', 'file.pdf');
		    document.body.appendChild(link);
		    link.click();
		  })  
		  .catch((error) => {
		    this.errors = error.response.data.errors
		    this.message = 'failed ';
		    this.snackbar = true;
		    this.color = 'red';
		  });
		},

		close() {
			this.$emit('closeRequest')
		},
	},
	mounted() {

		axios.post('getComments')
		.then((response) => {
			this.AllComments = response.data
		})
		.catch((error) => {
			this.errors = error.response.data.errors
		})

		axios.post('getCategory')
		.then((response) => {
			this.Alldocs = response.data
			this.loader=false
		})
		.catch((error) => {
			this.errors = error.response.data.errors
			this.loader=false
		})
	}
}
</script>