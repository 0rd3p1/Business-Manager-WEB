package com.project.PaymentAPI.service;

import org.springframework.stereotype.Service;

import com.project.PaymentAPI.dto.PaymentDTO;

@Service
public class PaymentService {
    public boolean proc(PaymentDTO payment) {
        // Simulação simples: se valor for maior que zero, é aprovado
        return payment.getValue() > 0;
    }
}
