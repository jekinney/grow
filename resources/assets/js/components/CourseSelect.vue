<template>
	<div class="row">

        <div class="col">
            <label for="root-course">Root Course</label>
            <select 
                v-model="root" 
                id="root-course"  
                @change="getSubcourses"
                class="form-control"
                :disabled="loading"
            >
                <option value="">Select a root course</option>
                <option v-for="course in JSON.parse( courses )" :value="course.id">{{ course.name }}</option>
            </select>
        </div>
        
        <div class="col">
            <label for="subcourse">Subcourse(s)</label>
            <select 
                name="subcourse" 
                id="subcourse" 
                class="form-control"
                multiple="true" 
                :disabled="subcourses.length == 0 || loading"
            >
                <option v-if="subcourses.length == 0" value="">Select a sub course</option>
                <option v-for="sub in subcourses" :value="sub.id">{{ sub.name }}</option>
            </select>
        </div>

    </div>
</template>

<script>
	export default {
		props: ['courses'],
		data () {
			return {
				root: null,
				loading: false,
				subcourse: null,
				subcourses: []
			}
		},
		methods: {
			getSubcourses () {
				this.loading = true

				axios.get( '/dashboard/subcourse?id=' + this.root ).then( response => {
					this.subcourses = response.data.data
				}).catch( errors => {

				})

				this.loading = false
			}
		}
	}
</script>