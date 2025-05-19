<script setup lang="ts">
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
// import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const showForm = ref(false);
const form = ref({
    name: '',
    project_code: '',
    description: '',
    location: '',
    city: '',
    province: '',
    start_date: '',
    end_date: '',
    status: 'planning',
    progress: 0,
    budget: '',
    actual_cost: '',
    client_id: '',
    project_manager_id: '',
});

function submitForm() {
    router.post('/projects', form.value, {
        onSuccess: () => {
            showForm.value = false;
            form.value = {
                name: '',
                project_code: '',
                description: '',
                location: '',
                city: '',
                province: '',
                start_date: '',
                end_date: '',
                status: 'planning',
                progress: 0,
                budget: '',
                actual_cost: '',
                client_id: '',
                project_manager_id: '',
            };
        },
    });
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Projects',
        href: '/projects',
    },
];
</script>

<template>
    <Head title="Projects" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="px-6 py-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Projects</h1>
                    <p class="text-gray-600 mt-1">A clean, organized hub for all your initiatives. </p>
                </div>
                <button
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center gap-2 w-full sm:w-auto justify-center"
                    @click="showForm = true"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Project
                </button>
            </div>

            <!-- Modal -->
            <transition
                enter-active-class="transition ease-out duration-200"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="transition ease-in duration-150"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div v-if="showForm" class="fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75" @click="showForm = false"></div>
                        </div>

                        <!-- Modal container -->
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                            <div class="bg-white px-6 py-5 sm:p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-bold text-gray-800">Add New Project</h2>
                                    <button
                                        class="text-gray-400 hover:text-gray-500 focus:outline-none"
                                        @click="showForm = false"
                                        aria-label="Close"
                                    >
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                
                                <form @submit.prevent="submitForm" class="space-y-5">
                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Name <span class="text-red-500">*</span></label>
                                            <input 
                                                v-model="form.name" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                required 
                                            />
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Project Code <span class="text-red-500">*</span></label>
                                            <input 
                                                v-model="form.project_code" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                required 
                                            />
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea 
                                            v-model="form.description" 
                                            rows="3" 
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                        ></textarea>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Location</label>
                                            <input 
                                                v-model="form.location" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">City</label>
                                            <input 
                                                v-model="form.city" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Province</label>
                                            <input 
                                                v-model="form.province" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Start Date</label>
                                            <input 
                                                v-model="form.start_date" 
                                                type="date" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">End Date</label>
                                            <input 
                                                v-model="form.end_date" 
                                                type="date" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-gray-700">Status</label>
                                        <select 
                                            v-model="form.status" 
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                        >
                                            <option value="planning">Planning</option>
                                            <option value="in_progress">In Progress</option>
                                            <option value="completed">Completed</option>
                                        </select>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Progress (%)</label>
                                            <input 
                                                v-model.number="form.progress" 
                                                type="number" 
                                                min="0" 
                                                max="100" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Budget</label>
                                            <div class="relative rounded-md shadow-sm">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 sm:text-sm">$</span>
                                                </div>
                                                <input 
                                                    v-model="form.budget" 
                                                    type="number" 
                                                    class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                />
                                            </div>
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Actual Cost</label>
                                            <div class="relative rounded-md shadow-sm">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 sm:text-sm">$</span>
                                                </div>
                                                <input 
                                                    v-model="form.actual_cost" 
                                                    type="number" 
                                                    class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Client ID</label>
                                            <input 
                                                v-model="form.client_id" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Project Manager ID</label>
                                            <input 
                                                v-model="form.project_manager_id" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                                        <button 
                                            type="button" 
                                            class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500"
                                            @click="showForm = false"
                                        >
                                            Cancel
                                        </button>
                                        <button 
                                            type="submit" 
                                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500"
                                        >
                                            Create Project
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>

            <!-- Projects Table -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="project in projects" :key="project.id" class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ project.name }}</div>
                                            <div class="text-sm text-gray-500">{{ project.location }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 font-mono">{{ project.project_code }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span 
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize"
                                        :class="{
                                            'bg-yellow-100 text-yellow-800': project.status === 'planning',
                                            'bg-blue-100 text-blue-800': project.status === 'in_progress',
                                            'bg-green-100 text-green-800': project.status === 'completed'
                                        }"
                                    >
                                        {{ project.status.replace('_', ' ') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-full mr-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div 
                                                    class="h-2.5 rounded-full" 
                                                    :class="{
                                                        'bg-yellow-500': project.progress < 50,
                                                        'bg-blue-500': project.progress >= 50 && project.progress < 100,
                                                        'bg-green-500': project.progress === 100
                                                    }" 
                                                    :style="`width: ${project.progress}%`"
                                                ></div>
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-500">{{ project.progress }}%</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ project.start_date }}</div>
                                    <div class="text-sm text-gray-500">to {{ project.end_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-emerald-600 hover:text-emerald-900 mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="!projects || projects.length === 0">
                                <td colspan="6" class="px-6 py-4 text-center">
                                    <div class="text-gray-500 py-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h3 class="mt-2 text-lg font-medium text-gray-700">No projects found</h3>
                                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new project</p>
                                        <button
                                            class="mt-4 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md shadow-sm text-sm font-medium"
                                            @click="showForm = true"
                                        >
                                            Add Project
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>