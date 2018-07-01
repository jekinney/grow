<template>
	<div class="row">

		<div class="col">
	        <label for="slug">Slug <small class="text-danger">Will be filled in when you type the Name</small></label>
	        <input type="text" name="slug" :value="slug" id="slug" class="form-control" :class="{ 'is-invalid': errors.slug }">
	        <div v-if="errors.slug" class="invalid-feedback">
            	{{ errors.slug[0] }}
            </div>
	    </div>
	    
	    <div class="col">
	        <label for="name">Name</label>
	        <input type="text" name="name" :value="name" id="name" class="form-control" :class="{ 'is-invalid': errors.name }">
	        <div v-if="errors.name" class="invalid-feedback">
            	{{ errors.name[0] }}
            </div>
	    </div>

	    <div class="col-3">
            <label for="publish_at">Publish Date</label>
            <input type="text" 
                :name="publish_at" 
                :value="publish_at"
                id="publish_at" 
                class="form-control"
                :class="{ 'is-invalid': errors.publish_at }"
            >
            <div v-if="errors.publish_at" class="invalid-feedback">
            	{{ errors.publish_at[0] }}
            </div>
        </div>

   	</div>
</template>

<script>
	export default {
		props: {
			slugged: {
				type: String,
				default: ''
			},
			named: {
				type: String,
				default: ''
			},
			date: {
				type: String,
				default: ''
			},
			errored: {
				type: String,
				default: null 
			}
		},
		data () {
			return {
				name: this.named,
				slug: this.slugged,
				errors: this.setErrors(),
				publish_at: this.date
			}
		},
		watch: {
			name (val) {
				this.slug = val.toString()
					.toLowerCase()
    				.replace(/\s+/g, '-')           // Replace spaces with -
				    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
				    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
				    .replace(/^-+/, '')             // Trim - from start of text
				    .replace(/-+$/, '');            // Trim - from end of text
			} 
		},
		methods: {
			setErrors () {
				if ( this.errored ) {
					return this.errors = JSON.parse( this.errored )
				}

				return this.errors = []
			}
		}
	}
</script>