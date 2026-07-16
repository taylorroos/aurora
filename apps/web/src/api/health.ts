import { apiFetch } from './client';

export interface HealthResponse {
  status: string;
  application: string;
  version: string;
}

export function getHealth() {
  return apiFetch<HealthResponse>('/health');
}