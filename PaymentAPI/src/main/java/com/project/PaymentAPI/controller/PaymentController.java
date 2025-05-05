package com.project.PaymentAPI.controller;

import com.project.PaymentAPI.dto.PaymentDTO;
import com.project.PaymentAPI.service.PaymentService;

import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/payment")
public class PaymentController {

    private final PaymentService paymentService;

    public PaymentController(PaymentService paymentService) {
        this.paymentService = paymentService;
    }

    @PostMapping
    public ResponseEntity<String> procPayment(@RequestBody PaymentDTO payment) {
        boolean sucesso = paymentService.proc(payment);

        if (sucesso) {
            return ResponseEntity.ok("Pagamento aprovado");
        } else {
            return ResponseEntity.status(402).body("Pagamento recusado");
        }
    }
}