<template>
    <div class="records-list" v-for="temporaryRecords in this.records">
        <div v-for="record in temporaryRecords">
            <div class="record-item">
                <a v-bind:href="'record/' + record.slug">{{ record.name }}</a>
                <img v-if="record.image" v-bind:src="record.image">
                <p class="shortDescription">{{ record.description }}</p>
                <p class="author">{{ record.author }}</p>
            </div>
        </div>
    </div>
    <button @click="getPeaceRecords" v-if="start < maxCount">Show More</button>
</template>
<script>
export default {
    data() {
        return {
            records: [],
            waitChecker: false,
            start: 0,
            count: 3,
            page: 0,
            maxCount: 0,
        }
    },
    created() {
        this.getAllRecords();
    },
    mounted() {
        this.getPeaceRecords();
    },
    methods: {
        getPeaceRecords() {
            this.waitChecker = true;
            axios
                .post('api/getRecords', {
                    start: this.start,
                    count: this.count,
                })
                .then(response => {
                    this.records[this.page] = response.data;
                    this.start += this.count;
                    this.waitChecker = false;
                    this.page++;
                })
        },
        getAllRecords() {
            axios
                .post('api/getCountRecords')
                .then(response => {
                    this.maxCount = response.data;
                })
        }
    }
}
</script>
