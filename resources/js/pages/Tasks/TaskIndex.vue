<script setup lang="ts">
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

// Dummy tasks data
const tasks = ref([
  {
    id: 1,
    title: 'Foundation Pouring',
    project: 'Riverfront Tower',
    assignee: 'Concrete Team A',
    due_date: '2023-11-15',
    status: 'in_progress',
    priority: 'high',
    progress: 75,
    checklist: [
      { id: 1, text: 'Formwork inspection', completed: true },
      { id: 2, text: 'Rebar installation', completed: true },
      { id: 3, text: 'Concrete delivery', completed: false }
    ]
  },
  {
    id: 2,
    title: 'Structural Steel Erection - Level 5',
    project: 'Riverfront Tower',
    assignee: 'Steel Team B',
    due_date: '2023-11-28',
    status: 'not_started',
    priority: 'medium',
    progress: 0,
    checklist: [
      { id: 1, text: 'Steel delivery', completed: false },
      { id: 2, text: 'Crane setup', completed: false }
    ]
  },
  {
    id: 3,
    title: 'Electrical Rough-In',
    project: 'Downtown Office Renovation',
    assignee: 'Electrical Team C',
    due_date: '2023-11-10',
    status: 'completed',
    priority: 'low',
    progress: 100,
    checklist: [
      { id: 1, text: 'Conduit installation', completed: true },
      { id: 2, text: 'Wire pulling', completed: true },
      { id: 3, text: 'Panel connections', completed: true }
    ]
  }
]);

const statusOptions = [
  { value: 'not_started', label: 'Not Started' },
  { value: 'in_progress', label: 'In Progress' },
  { value: 'on_hold', label: 'On Hold' },
  { value: 'completed', label: 'Completed' }
];

const priorityOptions = [
  { value: 'low', label: 'Low' },
  { value: 'medium', label: 'Medium' },
  { value: 'high', label: 'High' },
  { value: 'critical', label: 'Critical' }
];

const showTaskForm = ref(false);
const currentTask = ref({
  id: null,
  title: '',
  project: '',
  assignee: '',
  due_date: '',
  status: 'not_started',
  priority: 'medium',
  checklist: []
});

function openEditTask(task) {
  currentTask.value = JSON.parse(JSON.stringify(task));
  showTaskForm.value = true;
}

function saveTask() {
  if (currentTask.value.id) {
    // Update existing task
    const index = tasks.value.findIndex(t => t.id === currentTask.value.id);
    tasks.value[index] = currentTask.value;
  } else {
    // Add new task
    currentTask.value.id = tasks.value.length + 1;
    tasks.value.unshift(currentTask.value);
  }
  showTaskForm.value = false;
  resetTaskForm();
}

function resetTaskForm() {
  currentTask.value = {
    id: null,
    title: '',
    project: '',
    assignee: '',
    due_date: '',
    status: 'not_started',
    priority: 'medium',
    checklist: []
  };
}
</script>

<template>
  <Head title="Tasks" />
  <AppLayout>
    <div class="px-4 py-6 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="sm:flex sm:items-center sm:justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Task Management</h1>
          <p class="mt-2 text-sm text-gray-700">Track and manage all construction tasks across projects</p>
        </div>
        <button
          @click="openEditTask(currentTask)"
          class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
          <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
          </svg>
          New Task
        </button>
      </div>

      <!-- Task Form Modal -->
      <Transition enter-active-class="transition ease-out duration-100" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <div v-if="showTaskForm" class="fixed z-10 inset-0 overflow-y-auto">
          <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
              <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full sm:p-6">
              <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                  {{ currentTask.id ? 'Edit Task' : 'Create New Task' }}
                </h3>
                <div class="space-y-4">
                  <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                    <input v-model="currentTask.title" type="text" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                  </div>
                  
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                      <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
                      <input v-model="currentTask.project" type="text" id="project" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                      <label for="assignee" class="block text-sm font-medium text-gray-700">Assignee</label>
                      <input v-model="currentTask.assignee" type="text" id="assignee" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                  </div>
                  
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                      <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                      <input v-model="currentTask.due_date" type="date" id="due_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                      <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                      <select v-model="currentTask.status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option v-for="option in statusOptions" :value="option.value">{{ option.label }}</option>
                      </select>
                    </div>
                  </div>
                  
                  <div>
                    <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                    <select v-model="currentTask.priority" id="priority" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                      <option v-for="option in priorityOptions" :value="option.value">{{ option.label }}</option>
                    </select>
                  </div>
                  
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Checklist</label>
                    <div class="mt-2 space-y-2">
                      <div v-for="(item, index) in currentTask.checklist" :key="item.id" class="flex items-center">
                        <input v-model="item.completed" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <input v-model="item.text" type="text" class="ml-2 block flex-1 border-gray-300 rounded-md shadow-sm py-1 px-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <button @click="currentTask.checklist.splice(index, 1)" class="ml-2 text-red-500 hover:text-red-700">
                          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                      <button @click="currentTask.checklist.push({ id: Date.now(), text: '', completed: false })" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add Item
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                <button @click="saveTask" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                  Save
                </button>
                <button @click="showTaskForm = false; resetTaskForm();" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>
      </Transition>

      <!-- Task List -->
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Task</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assignee</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="task in tasks" :key="task.id" class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-full" :class="{
                      'bg-blue-100': task.priority === 'high',
                      'bg-yellow-100': task.priority === 'medium',
                      'bg-gray-100': task.priority === 'low'
                    }">
                      <svg class="h-6 w-6" :class="{
                        'text-blue-600': task.priority === 'high',
                        'text-yellow-600': task.priority === 'medium',
                        'text-gray-600': task.priority === 'low'
                      }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                      </svg>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">{{ task.title }}</div>
                      <div class="text-sm text-gray-500">{{ task.checklist.filter(i => i.completed).length }}/{{ task.checklist.length }} completed</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ task.project }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ task.assignee }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ task.due_date }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="{
                    'bg-gray-100 text-gray-800': task.status === 'not_started',
                    'bg-blue-100 text-blue-800': task.status === 'in_progress',
                    'bg-yellow-100 text-yellow-800': task.status === 'on_hold',
                    'bg-green-100 text-green-800': task.status === 'completed'
                  }">
                    {{ statusOptions.find(s => s.value === task.status).label }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="w-20 mr-2">
                      <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="h-2.5 rounded-full" :class="{
                          'bg-blue-600': task.progress < 100,
                          'bg-green-600': task.progress === 100
                        }" :style="`width: ${task.progress}%`"></div>
                      </div>
                    </div>
                    <div class="text-sm text-gray-500">{{ task.progress }}%</div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="{
                    'bg-red-100 text-red-800': task.priority === 'critical',
                    'bg-orange-100 text-orange-800': task.priority === 'high',
                    'bg-yellow-100 text-yellow-800': task.priority === 'medium',
                    'bg-gray-100 text-gray-800': task.priority === 'low'
                  }">
                    {{ priorityOptions.find(p => p.value === task.priority).label }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button @click="openEditTask(task)" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                  <button class="text-red-600 hover:text-red-900">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AppLayout>
</template>