<script setup lang="ts">
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const showForm = ref(false);
const form = ref({
    client_type: 'individual',
    full_name: '',
    company_name: '',
    contact_person: '',
    email: '',
    phone: '',
    address: '',
    city: '',
    province: '',
    industry: 'other',
    status: 'active',
    website: '',
    identification_number: '',
    tax_number: '',
});

function submitForm() {
    router.post('/clients', form.value, {
        onSuccess: () => {
            showForm.value = false;
            resetForm();
        },
    });
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Clients',
        href: '/clients',
    },
];

function resetForm() {
    form.value = {
        client_type: 'individual',
        full_name: '',
        company_name: '',
        contact_person: '',
        email: '',
        phone: '',
        address: '',
        city: '',
        province: '',
        industry: 'other',
        status: 'active',
        website: '',
        identification_number: '',
        tax_number: '',
    };
}
</script>

<template>
    <Head title="Clients" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="px-6 py-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Client Management</h1>
                    <p class="text-gray-600 mt-1">Manage both individual and corporate clients.</p>
                </div>
                <button
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center gap-2 w-full sm:w-auto justify-center"
                    @click="showForm = true"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Client
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
                                    <h2 class="text-2xl font-bold text-gray-800">New Client</h2>
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
                                    <!-- Client Type Selector -->
                                    <div class="border-b border-gray-200 pb-5">
                                        <div class="flex items-center gap-6">
                                            <label class="flex items-center gap-2">
                                                <input 
                                                    type="radio" 
                                                    v-model="form.client_type" 
                                                    value="individual"
                                                    class="h-4 w-4 text-emerald-600 focus:ring-emerald-500"
                                                >
                                                <span class="text-sm font-medium text-gray-700">Individual</span>
                                            </label>
                                            <label class="flex items-center gap-2">
                                                <input 
                                                    type="radio" 
                                                    v-model="form.client_type" 
                                                    value="company"
                                                    class="h-4 w-4 text-emerald-600 focus:ring-emerald-500"
                                                >
                                                <span class="text-sm font-medium text-gray-700">Company</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Dynamic Fields -->
                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                        <!-- Individual Fields -->
                                        <div v-if="form.client_type === 'individual'" class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Full Name <span class="text-red-500">*</span>
                                            </label>
                                            <input 
                                                v-model="form.full_name" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                required
                                            />
                                        </div>
                                        
                                        <!-- Company Fields -->
                                        <div v-if="form.client_type === 'company'" class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Company Name <span class="text-red-500">*</span>
                                            </label>
                                            <input 
                                                v-model="form.company_name" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                required
                                            />
                                        </div>

                                        <div v-if="form.client_type === 'company'" class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Contact Person</label>
                                            <input 
                                                v-model="form.contact_person" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>

                                        <div v-if="form.client_type === 'individual'" class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">ID Number</label>
                                            <input 
                                                v-model="form.identification_number" 
                                                type="text" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                    </div>

                                    <!-- Common Fields -->
                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                                            <input 
                                                v-model="form.email" 
                                                type="email" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                required
                                            />
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input 
                                                v-model="form.phone" 
                                                type="tel" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                            />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Address</label>
                                            <input 
                                                v-model="form.address" 
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
                                        <div v-if="form.client_type === 'company'" class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Industry</label>
                                            <select 
                                                v-model="form.industry" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                            >
                                                <option value="technology">Technology</option>
                                                <option value="finance">Finance</option>
                                                <option value="manufacturing">Manufacturing</option>
                                                <option value="retail">Retail</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-gray-700">Status</label>
                                            <select 
                                                v-model="form.status" 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                            >
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                                <option value="lead">Lead</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-gray-700">Website</label>
                                        <div class="flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                                https://
                                            </span>
                                            <input 
                                                v-model="form.website" 
                                                type="text" 
                                                class="flex-1 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                                placeholder="yourdomain.com"
                                            />
                                        </div>
                                    </div>

                                    <div v-if="form.client_type === 'company'" class="space-y-1">
                                        <label class="block text-sm font-medium text-gray-700">Tax Number</label>
                                        <input 
                                            v-model="form.tax_number" 
                                            type="text" 
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500" 
                                        />
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
                                            Save Client
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>

            <!-- Clients Table -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="client in clients" :key="client.id" class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" 
                                        :class="{
                                            'bg-purple-100 text-purple-800': client.client_type === 'individual',
                                            'bg-blue-100 text-blue-800': client.client_type === 'company'
                                        }">
                                        {{ client.client_type === 'individual' ? 'Individual' : 'Company' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path v-if="client.client_type === 'company'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ client.client_type === 'company' ? client.company_name : client.full_name }}
                                            </div>
                                            <div v-if="client.client_type === 'company'" class="text-sm text-gray-500">
                                                {{ client.contact_person || '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ client.email }}</div>
                                    <div class="text-sm text-gray-500">{{ client.phone || '-' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div v-if="client.client_type === 'company'" class="text-sm text-gray-900">
                                        <span class="font-medium">Industry:</span> {{ client.industry }}
                                    </div>
                                    <div v-else class="text-sm text-gray-900">
                                        <span class="font-medium">ID:</span> {{ client.identification_number || '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span 
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize"
                                        :class="{
                                            'bg-green-100 text-green-800': client.status === 'active',
                                            'bg-gray-100 text-gray-800': client.status === 'inactive',
                                            'bg-blue-100 text-blue-800': client.status === 'lead'
                                        }"
                                    >
                                        {{ client.status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-emerald-600 hover:text-emerald-900 mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="!clients || clients.length === 0">
                                <td colspan="6" class="px-6 py-4 text-center">
                                    <div class="text-gray-500 py-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <h3 class="mt-2 text-lg font-medium text-gray-700">No clients found</h3>
                                        <p class="mt-1 text-sm text-gray-500">Get started by adding your first client</p>
                                        <button
                                            class="mt-4 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md shadow-sm text-sm font-medium"
                                            @click="showForm = true"
                                        >
                                            Add Client
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