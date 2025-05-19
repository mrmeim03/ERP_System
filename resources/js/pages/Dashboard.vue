<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
       <!-- <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-12 p-4 w-full"> -->
 <div class="bg-white p-4 shadow rounded-lg mb-6">
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
      <h1 class="text-2xl font-bold text-gray-800">Project: <span class="text-blue-600">Roden Juanico 2-storey Residential</span></h1>
      <p class="text-gray-600">Client: ABC Development | Project ID: CON-2024-017</p>
    </div>
    <div class="flex gap-2">
      <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">On Schedule</span>
      <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Budget: $4.2M</span>
    </div>
  </div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
  <!-- Progress -->
  <div class="bg-white p-4 rounded-lg shadow">
    <div class="flex items-center justify-between">
      <h3 class="text-gray-500 font-medium">Progress</h3>
      <span class="text-blue-600 font-bold">68%</span>
    </div>
    <div class="mt-2 h-2 bg-gray-200 rounded-full">
      <div class="h-2 bg-blue-500 rounded-full" style="width: 68%"></div>
    </div>
  </div>
  
  <!-- Days Remaining -->
  <div class="bg-white p-4 rounded-lg shadow">
    <div class="flex items-center justify-between">
      <h3 class="text-gray-500 font-medium">Days Remaining</h3>
      <span class="text-orange-500 font-bold">87</span>
    </div>
    <p class="mt-1 text-sm text-gray-500">Target: May 15, 2025</p>
  </div>
  
  <!-- Budget Utilization -->
  <div class="bg-white p-4 rounded-lg shadow">
    <div class="flex items-center justify-between">
      <h3 class="text-gray-500 font-medium">Budget Used</h3>
      <span class="text-green-600 font-bold">62%</span>
    </div>
    <p class="mt-1 text-sm text-gray-500">$2.6M of $4.2M</p>
  </div>
  
  <!-- Safety Incidents -->
  <div class="bg-white p-4 rounded-lg shadow">
    <div class="flex items-center justify-between">
      <h3 class="text-gray-500 font-medium">Number of Workers</h3>
      <span class="text-red-500 font-bold">20</span>
    </div>
    <p class="mt-1 text-sm text-gray-500">Foreman: Jonh Ley</p>
  </div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
  <div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Budget Allocation</h2>
    <div class="flex flex-col md:flex-row items-center gap-6">
      <div class="relative w-40 h-40">
        <svg viewBox="0 0 36 36" class="w-full h-full">
          <circle class="text-gray-200" stroke="currentColor" stroke-width="4" fill="none" cx="18" cy="18" r="16"/>
          <circle class="text-blue-500" stroke="currentColor" stroke-width="4" stroke-dasharray="45, 100" stroke-linecap="round" fill="none" cx="18" cy="18" r="16" transform="rotate(-90 18 18)"/>
          <circle class="text-green-500" stroke="currentColor" stroke-width="4" stroke-dasharray="30, 100" stroke-dashoffset="45" stroke-linecap="round" fill="none" cx="18" cy="18" r="16" transform="rotate(-90 18 18)"/>
          <circle class="text-yellow-400" stroke="currentColor" stroke-width="4" stroke-dasharray="25, 100" stroke-dashoffset="75" stroke-linecap="round" fill="none" cx="18" cy="18" r="16" transform="rotate(-90 18 18)"/>
        </svg>
        <div class="absolute inset-0 flex items-center justify-center">
          <span class="text-xl font-bold text-gray-700">$4.2M</span>
        </div>
      </div>
      <div class="space-y-3">
        <div class="flex items-center gap-2">
          <span class="inline-block w-3 h-3 rounded-full bg-blue-500"></span>
          <span class="text-gray-700">Materials (45%)</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="inline-block w-3 h-3 rounded-full bg-green-500"></span>
          <span class="text-gray-700">Labor (30%)</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="inline-block w-3 h-3 rounded-full bg-yellow-400"></span>
          <span class="text-gray-700">Equipment (25%)</span>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Recent Activities -->
  <div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h2>
    <div class="space-y-4">
      <div class="flex gap-3">
        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <div>
          <p class="text-sm font-medium text-gray-800">Concrete pouring completed</p>
          <p class="text-xs text-gray-500">Today, 10:45 AM</p>
        </div>
      </div>
      <!-- More activity items -->
        <div class="flex gap-3">
            <div class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            </div>
            <div>
            <p class="text-sm font-medium text-gray-800">Safety drill conducted</p>
            <p class="text-xs text-gray-500">Yesterday, 3:30 PM</p>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="bg-white p-4 rounded-lg shadow mb-6">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-lg font-semibold text-gray-800">Pending Tasks</h2>
    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</button>
  </div>
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Task</th>
          <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Assigned To</th>
          <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Due Date</th>
          <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr>
          <td class="px-4 py-3 text-sm font-medium text-gray-900">Steel Beam Installation</td>
          <td class="px-4 py-3 text-sm text-gray-500">Structural Team</td>
          <td class="px-4 py-3 text-sm text-gray-500">Feb 15, 2024</td>
          <td class="px-4 py-3">
            <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
          </td>
        </tr>
        <!-- More task rows -->
         <tr>
          <td class="px-4 py-3 text-sm font-medium text-gray-900">Steel Beam Installation</td>
          <td class="px-4 py-3 text-sm text-gray-500">Structural Team</td>
          <td class="px-4 py-3 text-sm text-gray-500">Feb 15, 2024</td>
          <td class="px-4 py-3">
            <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
          </td>
        </tr><tr>
          <td class="px-4 py-3 text-sm font-medium text-gray-900">Steel Beam Installation</td>
          <td class="px-4 py-3 text-sm text-gray-500">Structural Team</td>
          <td class="px-4 py-3 text-sm text-gray-500">Feb 15, 2024</td>
          <td class="px-4 py-3">
            <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
          </td>
        </tr><tr>
          <td class="px-4 py-3 text-sm font-medium text-gray-900">Footing Installation.</td>
          <td class="px-4 py-3 text-sm text-gray-500">Structural Team</td>
          <td class="px-4 py-3 text-sm text-gray-500">January 10, 2024</td>
          <td class="px-4 py-3">
            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-700 text-gray-100">Done</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        <!-- </div> -->
    </AppLayout>
</template>
